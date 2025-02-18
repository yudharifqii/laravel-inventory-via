<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaworkspace</title>

    <link rel="shortcut icon" href="{{asset('assets/static/images/logo/via.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/error.css')}}">
</head>

<body>
    <script src="{{asset('assets/static/js/initTheme.js')}}"></script>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{asset('assets/compiled/svg/error-404.svg')}}" alt="Not Found">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>Halaman yang Anda cari tidak ditemukan.</p>
                    <a href="{{Route('dashboardPage')}}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>