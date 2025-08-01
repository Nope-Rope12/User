<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link rel="stylesheet" href="/assets/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="signup">
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
        <form action="{{route('form.create')}}" method='post' enctype="multipart/form-data">
            @csrf
            <h1>Sign Up</h1>

            <div class="user-img">
                <img src="{{ asset('assets/image.png') }}" alt="Preview" class="preview" id="preview">
                <br>
                <label for="fileInput" class="upload-label">Choose Photo</label>
                <input type="file" accept="image/*" name="image" id="fileInput" hidden>
                <br>
                <span style="color:red">@error('user-photo'){{ $message }}@enderror</span>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Username" name='username' value='{{old('username')}}'>
                <span style='color:red'>@error('username'){{$message}}@enderror</span>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Email" name='email' value='{{old('email')}}'>
                <span style='color:red'>@error('email'){{$message}}@enderror</span>
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name='password' value='{{old('password')}}'>
                <span style='color:red'>@error('password'){{$message}}@enderror</span>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirm Password" name='confirm_password'>
                <span style='color:red'>@error('confirm_password'){{$message}}@enderror</span>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Phone Number" name='phone_no' value='{{old('phone_no')}}'>
                <span style='color:red'>@error('phone_no'){{$message}}@enderror</span>
                <i class='bx bxs-phone'></i>
            </div>

           <!-- <div class="input-box">
                <textarea name="boi" rows="5" placeholder="Write something about yourself..."></textarea>
                <span style='color:red'>@error('boi'){{$message}}@enderror</span>
            </div> -->

            <button type="submit">Create Account</button>
            <div class  ="log-in">
                <p>Have an Account?<br><a href="/login">Log in</a></p>
            </div>
        </form>
    </div>

    <script src='{{asset('JS/signup.js')}}'></script>

</body>
</html>
