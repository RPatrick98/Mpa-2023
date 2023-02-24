<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="continer">
        <div class="row">
            <div class="form-user-cointeiner col-md-4 col-md-offset-4 ">
                <h4>Registration</h4>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    <div class="form-group">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Registreren</button>
                    </div>
                    <br>
                    <a href="login">Heb je wel een account? !! Hier kan je inloggen.</a>
                </form>
            </div>
            
        </div>
    </div>
        
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>