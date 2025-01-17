<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/static/images/logo/via.png')}}" type="image/x-icon">
    <title>Viaworkspace</title>
    <link href="{{asset('landing/css/login.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">


</head>

<body>
    <div class="container">
        <!-- Left Section: Login Form -->
        <div class="login-section">
            <div class="form-container">
                <h2>Login</h2>
                @if (session('error'))
                <div class="alert alert-danger"> {{ session('error') }}</div>
                @endif
                <form action="{{Route('loginPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="off">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                </form>
            </div>
        </div>
        <div class="image-section">
            <img src="{{asset('assets/static/images/logo/login.png')}}" alt="logo">
        </div>
    </div>
</body>

</html>