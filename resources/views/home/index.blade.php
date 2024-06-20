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

    <section class="py-5">
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

    <section class="mb-5">
        <div class="container">
            <h1 class="mb-0 text-center mb-5">HARGA & FASILITAS</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rumah Tipe 54/98</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><sup>Rp</sup>349 Jt<span>(Komersil)</span></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 2 Kamar Tidur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 1 Kamar Mandi</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Ruang Tamu</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Dapur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Carport</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Bangunan 45 m<sup>2</sup>
                                </li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Tanah 96 m<sup>2</sup>
                                    (6x14m)</li>
                            </ul>
                            <a href="#team" class="btn btn-info mt-3 d-block mx-auto">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rumah Subsidi Tipe 30/60</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><sup>Rp</sup>900 Rb <span>(perbulan)</span></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 2 Kamar Tidur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 1 Kamar Mandi</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Ruang Tamu</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Dapur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Carport</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Bangunan 30 m<sup>2</sup>
                                </li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Tanah 60 m<sup>2</sup>
                                    (6x10m)</li>
                            </ul>
                            <a href="#team" class="btn btn-info mt-3 d-block mx-auto">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rumah Tipe 45/84</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><sup>Rp</sup>425 Jt<span>(Komersil)</span></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 2 Kamar Tidur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> 1 Kamar Mandi</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Ruang Tamu</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Dapur</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Carport</li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Bangunan 45
                                    m<sup>2</sup></li>
                                <li class="list-group-item"><i class="fa fa-check mr-2"></i> Luas Tanah 98 m<sup>2</sup>
                                    (7x14m)</li>
                            </ul>
                            <a href="#team" class="btn btn-info mt-3 d-block mx-auto">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="counter-card text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                            class="purecounter">64</span>
                        <p>Total Unit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="counter-card text-center">
                        <span data-purecounter-start="0" data-purecounter-end="49" data-purecounter-duration="1"
                            class="purecounter">49</span>
                        <p>Subsidi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="counter-card text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter">15</span>
                        <p>Komersil</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="counter-card text-center">
                        <span data-purecounter-start="0" data-purecounter-end="48" data-purecounter-duration="1"
                            class="purecounter">48</span>
                        <p>Terjual</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Pilihan Tipe Rumah</h2>
                <p>Kamu bisa memilih tipe rumah sesuai keinginan dan kebutuhanmu</p>
            </div>
            <div class="row justify-content-center" data-aos="fade-right" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('foto/denah30.png') }}" class="card-img-top img-fluid" alt="denah30">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('foto/denah45.png') }}" class="card-img-top img-fluid" alt="denah45">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('foto/denah54.png') }}" class="card-img-top img-fluid" alt="denah54">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
