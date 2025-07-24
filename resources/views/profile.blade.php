<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('assets/profile.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="profile-container">

        <div class="profile-card">
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
            <div class="profile-header">
                @if($data->image)
                <img src='{{asset($data->image)}}' width='100' height='100'>
                @else
                <i class='bx bxs-user-circle profile-icon'></i>
                @endif

                <h2>{{ $data->username }}</h2>
                <p>ID: {{ $data->id }}</p>
            </div>

            <div class="profile-info">
                <div class="info-item">
                    <strong>Email:</strong>
                    <span>{{ $data->email }}</span>
                </div>
                <div class="info-item">
                    <strong>Phone:</strong>
                    <span>{{ $data->phone_no }}</span>
                </div>
            </div>

            <div class="profile-actions">
                <a href="#" class="btn">Edit Profile</a>
                <a href="{{route('form.logout')}}" class="btn logout">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
