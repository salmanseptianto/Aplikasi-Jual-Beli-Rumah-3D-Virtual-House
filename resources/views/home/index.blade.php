@extends('home.templates.index')

@section('page-content')
    <div class="hero-wrap" style="background-image: url('{{ asset('foto/home2.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animate d-flex align-items-end">
                    <div class="text w-100 text-center">
                        <h1 class="mb-4">Selamat Datang Di <span>Triehans Tanjung Village</span>.</h1>
                        <p><a href="{{ url('home/properti') }}" class="btn btn-danger py-2 px-4">Properti Kami</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-intro" style="background-color: #764ca3;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex">
                    <div class="intro d-lg-flex w-100 ftco-animate" style="background-color: #6953f5;">
                        <div class="icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="text">
                            <h2>Layanan 24 Jam</h2>
                            <p>Melayani Dengan Integritas Dan Pelayanan Yang Terpadu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-1 d-lg-flex w-100 ftco-animate" style="background-color: #6777ef;">
                        <div class="icon">
                            <span class="flaticon-cashback"></span>
                        </div>
                        <div class="text">
                            <h2>Harga Worth It</h2>
                            <p>Kami menjual properti dengan harga paling murah</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-2 d-lg-flex w-100 ftco-animate" style="background-color: #6953f5;">
                        <div class="icon">
                            <span class="flaticon-shopping-bag"></span>
                        </div>
                        <div class="text">
                            <h2>Properti Aman</h2>
                            <p>Properti legal dan bersurat lengkap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('foto/home.jpg') }}" width="100%" style="border-radius: 10px">
                </div>
                <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                    <div class="heading-section">

                        <h3 class="mt-4">Tentang kami</h3>
                        <p>
                            Properti Virtual adalah blogs properti yang berfokus pada penjualan berbagai jenis properti di
                            Brebes. Dengan pengalaman yang luas dan pemahaman mendalam tentang pasar properti di kawasan
                            tersebut, Properti Virtual telah menjadi mitra terpercaya bagi mereka yang mencari investasi
                            properti atau tempat tinggal di daerah Brebes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <h1 class="mb-0 text-center mb-5">Properti</h1>
        <div class="container">
            <div class="row">
                @foreach ($properti as $p)
                    @if (!$p->checkout_status)
                        <div class="col-md-4 d-flex">
                            <div class="product ftco-animate">
                                <div class="img d-fbex align-items-center justify-content-center">
                                    <a href="{{ url('home/detail/' . $p->idproperti) }}">
                                        <div class="img d-flex align-items-center justify-content-center"
                                            style="background-image: url('{{ asset('foto/' . $p->fotoproperti) }}');">
                                        </div>
                                    </a>

                                </div>
                                <div class="text text-center">
                                    <h2>{{ $p->namaproperti }}</h2>
                                    <p class="mb-0"><span class="price price-sale"></span> <span class="price">Rp
                                            {{ number_format($p->hargaproperti) }}</span></p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="text-center">
                <p><a href="{{ url('home/properti') }}" class="btn btn-danger py-2 px-4">Lihat Seluruh Properti</a></p>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-YU+2bMdsRXP9A9rIEU5zLDTb4gZZk6UtCCFi9aTE8UDnvPbJ8C/6RlupMvJNQ6KR" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyO8U6lZIeRqGgjz8I4N5aVRrM14DlTq" crossorigin="anonymous"></script>
@endsection
