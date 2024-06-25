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

    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('foto/logo.png') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/properti.css') }}">
</head>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>

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

    <nav class="navbar navbar-expand-lg navbar-danger ftco_navbar bg-white ftco-navbar-light" id="ftco-navbar"
        style="background-color: red;">
        <div class="container">
            <a class="navbar-brand text-black" href="{{ url('home') }}"> <img src="{{ asset('foto/logo.png') }}"
                    width="30px" style="border-radius: 10px;">&nbsp; Triehans Tanjung</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-list"></i>
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ url('home') }}" class="nav-link text-light">Home</a></li>
                    <li class="nav-item active"><a href="{{ url('home/properti') }}"
                            class="nav-link text-light">Properti</a>
                    </li>
                    <li class="nav-item active"><a href="{{ url('home/blog') }}" class="nav-link text-light">Blog</a>
                    </li>
                    @if (session('pengguna'))
                        <?php $akun = session('pengguna'); ?>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ url('home/akun') }}">Profil Akun</a>
                                <a class="dropdown-item" href="{{ url('home/keranjang') }}">Keranjang</a>
                                <a class="dropdown-item" href="{{ url('home/riwayat') }}">Riwayat Pembelian</a>
                                <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item active"><a href="{{ url('home/daftar') }}"
                                class="nav-link text-light">Daftar</a>
                        </li>
                        <li class="nav-item active"><a href="{{ url('home/login') }}"
                                class="nav-link text-light">Login</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    @yield('page-content')

    <footer class="ftco-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Alamat</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map marker"></span><span>
                                        <a class="text-white"
                                            href="https://maps.app.goo.gl/vNCYYzTcu22j5J1g7">JL.CENDRAWASIH PANTURA
                                            BREBES-TEGAL TANJUNG, BREBES (SEBELAH TIMUR KANTOR KECAMATAN TANJUNG)
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Kontak</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-whatsapp"></span><span
                                        class="text">0878-4323-2612</span>
                                </li>
                                <li><span class="icon fa fa-envelope"></span><span
                                        class="text">triehanstanjung@gmail.com</span>
                                </li>

                            </ul>
                        </div>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-YU+2bMdsRXP9A9rIEU5zLDTb4gZZk6UtCCFi9aTE8UDnvPbJ8C/6RlupMvJNQ6KR" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyO8U6lZIeRqGgjz8I4N5aVRrM14DlTq" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.0.4/dist/purecounter_vanilla.js"></script>
    <script>
        new PureCounter();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/home/js/script.js') }}"></script>
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
    </script>
</body>

</html>
