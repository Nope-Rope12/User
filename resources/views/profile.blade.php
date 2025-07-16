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
            <div class="profile-header">
                <i class='bx bxs-user-circle profile-icon'></i>
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
                <a href="#" class="btn logout">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
