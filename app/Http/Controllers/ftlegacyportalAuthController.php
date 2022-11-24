<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Carbon\Carbon;

class ftlegacyportalAuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function registration() {
        return view("auth.registration");
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'confirmemail'=>'required|email|unique:users|confirmed',
            'telephone'=>'required|max:11',
            'referralID'=>'required',
            'aimglobalID'=>'required',
            'address'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->confirmemail = $request->confirmemail;
        $user->telephone = $request->telephone;
        $user->referralID = $request->referralID;
        $user->aimglobalID = $request->aimglobalID;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success', 'You have registered successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request) {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:5|max:12'
        ]);

        $user = User::where('email','=',$request->email)->first(); 
        if($user){
            if(Hash::check($request->password,$user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else {
                return back()->with('fail', 'Password is incorrect');
            }
        }else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function dashboard() {

        $data = array();
        if(Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    
    public function logout() {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function showForgotForm() {
        return view('auth.forgot');
    }

    public function sendResetLink(Request $request) {
        $request->validate([
           'email'=>'required|email|exists:users,email' 
        ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token'=>$token,'email'=>$request->email]);
        $body = "We have received a request to reset the password for <b>ftlegacy</b> account associated with ".$request->email. ". You can reset your password by clicking the link below.";
    
        \Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('rafadebanjo@gmail.com','ftLegacy');
            $message->to($request->email,'Rafat')
                ->subject('Reset Password');

        });

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('reset')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else {
            
            User::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email' => $request->email,
            ])->delete();

            return redirect('login')->with('info', 'Your password has been changed! You can log in with the new password')->with('verifiedEmail', $request->email);

        }
    }

}
