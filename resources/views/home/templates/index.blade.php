<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eureka Property</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/animate.css') }}">
    <!-- Link CSS PureCounter -->
    <link rel="stylesheet" href="https://unpkg.com/purecounterjs@1.1.9/dist/purecounter.css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/purecounter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('foto/images/logo.png') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/properti.css') }}">
</head>

<body>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <center>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-white ftco-navbar-light" id="ftco-navbar"
        style="background-color: red;">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ url('home') }}">
                <img src="{{ asset('foto/images/logo.png') }}" class="logo-img" alt="HR GROUP Logo">
                &nbsp; HR GROUP
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-list" style="color: #686D76;"></i>
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="{{ url('home') }}" class="nav-link text-light font-weight-bold">Home</a>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#" id="dropdown04"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ url('home/properti') }}">PROPERTI</a>
                            <a class="dropdown-item" href="{{ url('home/agent') }}">AGENT</a>
                            <a class="dropdown-item" href="{{ url('home/karir') }}">INFO LOKER</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ url('home/about') }}" class="nav-link text-light font-weight-bold">About</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ url('home/blog') }}" class="nav-link text-light font-weight-bold">Blog</a>
                    </li>
                    @if (session('pengguna'))
                        <?php $akun = session('pengguna'); ?>
                        <li class="nav-item active dropdown text-dark">
                            <a class="nav-link dropdown-toggle text-white font-weight-bold" href="#"
                                id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Akun</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ url('home/akun') }}">Profil Akun</a>
                                <a class="dropdown-item" href="{{ url('home/keranjang') }}">Keranjang</a>
                                <a class="dropdown-item" href="{{ url('home/riwayat') }}">Riwayat Pembelian</a>
                                <a class="dropdown-item" href="{{ url('home/logout') }}"
                                    onclick="confirmLogout()">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a href="{{ url('home/daftar') }}"
                                class="nav-link text-light font-weight-bold">Daftar</a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ url('home/login') }}" class="nav-link text-light font-weight-bold">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('page-content')

    <footer class="ftco-footer text-white py-3 justify-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2 mb-1">Alamat</h2>
                        <div class="block-23 mb-2">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="icon fa fa-map-marker"></span>
                                    <span>
                                        <a class="text-white" href="https://maps.app.goo.gl/vNCYYzTcu22j5J1g7">
                                            Jl.Yos Sudarso, Ruko Sapphire no.7 Pasarbatang-Brebes
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Kontak 1 -->
                <div class="col-md-3 mb-4">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2 mb-1">Kontak</h2>
                        <div class="block-23 mb-3">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="icon fa fa-whatsapp"></span>
                                    <span class="text">0811-124-808</span>
                                </li>
                                <li>
                                    <span class="icon fa fa-envelope"></span>
                                    <span class="text">Hrgroupsukses234@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Kontak 2 -->
                <div class="col-md-3 mb-4">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2 mb-1">Kontak</h2>
                        <div class="block-23 mb-3">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="icon fa fa-whatsapp"></span>
                                    <span class="text">0811-124-808</span>
                                </li>
                                <li>
                                    <span class="icon fa fa-envelope"></span>
                                    <span class="text">Hrgroupsukses234@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="5" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&sensor=false"></script>
    <script src="{{ asset('assets/home/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.1.4/dist/purecounter_vanilla.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan keluar dari akun Anda!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url('home/logout') }}';
                }
            });
        }

        // Function to handle navbar text color change on scroll
        window.onscroll = function() {
            var navbar = document.getElementById("ftco-navbar");
            var navLinks = document.querySelectorAll(".navbar-nav .nav-link");

            if (document.documentElement.scrollTop > 50) {
                // Change text color to black
                navLinks.forEach(function(link) {
                    link.classList.add("text-dark");
                    link.classList.remove("text-light");
                });
            } else {
                // Reset text color to light
                navLinks.forEach(function(link) {
                    link.classList.remove("text-dark");
                    link.classList.add("text-light");
                });
            }
        };
    </script>
    <script>
        // Inisialisasi PureCounter
        new PureCounter();
    </script>
    <!-- Script PureCounter -->
    <script src="https://unpkg.com/purecounterjs@1.1.9/dist/purecounter.js"></script>

</body>

</html>
