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
        {{-- Success Message --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-2" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-2" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <form action="{{route('form.login')}}" method="post">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Email" name='email' value='{{old('email')}}'>
                <span style='color:red'>@error('email'){{$message}}@enderror</span>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name='password'>
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
