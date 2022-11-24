<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTlegacy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <div class="login">
            <div class="ftlegacy-logo">
                <p>FTLEGACY</p>
            </div>
            <div class="termANDcondition">
                <p>All rights reserved.</p>
                <span>Privacy Policy</span>
                <span>Terms of service</span>
            </div>

        <div class="container">
            
            <div class="row login-center">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 mx-auto" style="margin-top: 20px">
                    <h4>Login</h4>
                    <hr>

                    <form action="{{route('login-user')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif

                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" placeholder="e.g adeola@gmail.com" name="email" value="{{old('email')}}">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" placeholder="Please enter your password" name="password" value="">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group mt-3">
                            <a href="forgot" class="mt-3">Forgot Password</a>
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn btn-block btn-primary" type="submit">Login</button>
                        </div>

                        <br>

                        <a href="registration">New user!!! Please register</a>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>