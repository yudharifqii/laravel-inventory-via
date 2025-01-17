<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Viaworkspace</title>

    <!-- Favicons -->
    <link href="{{asset('assets/static/images/logo/via.png')}}" rel="icon">
    <link href="{{asset('assets/static/images/logo/via.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('landing/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('landing/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('landing/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="" class="logo d-flex align-items-center me-auto">
                <img src="{{asset('assets/static/images/logo/via.png')}}" alt="logo">
                <h2 class="sitename">Viaworkspace</h2>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{Route('loginPage')}}">Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <h1>Transformasi Pengelolaan Inventaris Anda!</h1>
                        <p>Kelola data inventaris dengan mudah dan efisien</p>
                        <div class="d-flex">
                            <a href="#tentang" class="btn-get-started">Mulai</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{asset('landing/img/hero-img.png')}}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->



        <!-- About Section -->
        <section id="tentang" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            Fitur Utama:
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Catat barang secara real-time.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Akses sistem dari mana saja, kapan saja.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Dapatkan laporan inventaris secara otomatis.</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>Sistem Informasi Inventaris adalah solusi digital yang dirancang untuk membantu bisnis Anda dalam mengelola dan memantau seluruh proses inventaris barang. Dari pencatatan masuk dan keluar barang hingga laporan dan analisis, semua dapat diakses hanya dengan satu klik!</p>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->




        <!-- Services Section -->
        <section id="layanan" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-pen icon"></i></div>
                            <h4><a href="" class="stretched-link">Pencatatan Barang</a></h4>
                            <p>Catat setiap barang yang masuk dan keluar.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-journal-check icon"></i></div>
                            <h4><a href="" class="stretched-link">Pelaporan Lengkap</a></h4>
                            <p>Dapatkan laporan inventaris yang membantu pengambilan keputusan.
                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-graph-up-arrow icon"></i></div>
                            <h4><a href="" class="stretched-link">Akses Mudah</a></h4>
                            <p>Akses informasi inventaris kapan saja dan di mana saja.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-file-lock icon"></i></div>
                            <h4><a href="" class="stretched-link">Keamaman Data</a></h4>
                            <p>Data dilindungi dengan enkripsi canggih dan protokol keamanan.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->



    </main>

    <footer id="footer" class="footer">

        <div class="container copyright text-center mt-4">
            <p><?= date('Y'); ?> &copy;<strong class="px-1 sitename">Viaworkspace.</strong> <span>All Rights Reserved.</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('landing/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('landing/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('landing/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('landing/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('landing/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('landing/js/main.js')}}"></script>

</body>

</html>