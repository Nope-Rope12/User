<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link rel="stylesheet" href="/assets/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="login">
        <form action="{{route('form.login')}}" method="post">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name='username' value='{{old('username')}}'>
                <span style='color:red'>@error('username'){{$message}}@enderror</span>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name='password' value='{{old('password')}}'>
                <span style='color:red'>@error('password'){{$message}}@enderror</span>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button type="submit" class="button">Login</button>

            <div class="register">
                <p>
                    Don't have any account?
                    <a href="/signup/">Create Account</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
