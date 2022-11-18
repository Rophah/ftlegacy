<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTlegacy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto" style="margin-top: 20px">
                <h4>Registration</h4>
                <hr>

                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

                    @csrf
                    <div class="form-group mt-3">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" placeholder="e.g Adeola Adetayo" name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" placeholder="e.g adeola@gmail.com" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Confirm Email</label>
                        <input type="email" class="form-control" placeholder="Please, confirm your email" name="confirmemail" value="{{old('confirmemail')}}">
                        <span class="text-danger">@error('confirmemail') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Phone Number</label>
                        <input type="text" class="form-control" placeholder="e.g 08145944210" name="telephone" value="{{old('telephone')}}">
                        <span class="text-danger">@error('telephone') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Referral ID</label>
                        <input type="text" class="form-control" placeholder="Please enter your referral ID" name="referralID" value="{{old('referralID')}}">
                        <span class="text-danger">@error('referralID') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Aimglobal ID</label>
                        <input type="text" class="form-control" placeholder="Please enter your Aimglobal ID" name="aimglobalID" value="{{old('aimglobalID')}}">
                        <span class="text-danger">@error('aimglobalID') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" placeholder="e.g Plot 10, Jogunomi street, Gbagada, Lagos" name="address" value="{{old('address')}}">
                        <span class="text-danger">@error('address') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" placeholder="Please enter your password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>

                    <br>

                    <a href="login">Registered user? Please login here</a>

                   
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>