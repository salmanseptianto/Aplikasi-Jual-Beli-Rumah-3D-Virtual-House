@extends('home.templates.index')
@if (Session::has('alert'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Notification',
                text: '{{ Session::get('alert') }}',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
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
                        <p class="text-justify">
                            Triehans Village merupakan salah satu perumahan yang dikembangkan oleh PT. Kuasa Triehans
                            Semesta.
                            Berada di daerah Kota Brebes menjadikan Triehans Village memiliki akses yang strategis. Selain
                            itu, kualitas bangunan yang lebih unggul dibanding perumahan lain menjadi daya tarik tersendiri.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <h1 class="mb-0 text-center mb-5">HARGA & FASILITAS</h1>
            <div class="row">
                <div class="container">
                    <div class="row">
                        @if ($properti->count() > 0)
                            @foreach ($properti as $p)
                                <div class="col-md-4">
                                    <div class="card position-relative overflow-hidden">
                                        <img src="{{ asset('foto/' . $p->fotoproperti) }}" class="card-img-top"
                                            alt="{{ $p->namaproperti }}"
                                            style="height: 250px; object-fit: cover; width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title mt-2">{{ $p->namaproperti }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <sup>Rp</sup>{{ number_format($p->hargaproperti, 0, ',', '.') }}
                                                <span>({{ $p->perumahan }})</span>
                                            </h6>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> {{ $p->kamartidur }} Kamar
                                                    Tidur
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> {{ $p->kamarmandi }} Kamar
                                                    Mandi
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> Ruang Tamu
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> Dapur
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> Carport
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> Luas Bangunan
                                                    {{ $p->tipe }} m<sup>2</sup>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-check mr-2 text-info"></i> Luas Tanah
                                                    {{ $p->luas }} m<sup>2</sup>
                                                </li>
                                            </ul>
                                            <a href="{{ url('home/detail/' . $p->idproperti) }}"
                                                class="btn btn-info mt-3 d-block mx-auto">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <div class="alert alert-warning" role="alert">
                                    Maaf, properti tidak ditemukan.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-navy py-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 text-center text-lg-start mb-4 mb-lg-0">
                    <h3>Dapatkan Unitnya Sebelum Kehabisan!!!</h3>
                    <p>Kapan lagi bisa dapat Rumah Subsidi di Pusat Kota.
                        Unit terbatas! Jangan sampai kamu menyesal karena tidak mengambil kesempatan ini.
                        Silahkan pikirkan dan segera ambil keputusan!!!
                    </p>
                </div>
                <div class="col-lg-3 text-center text-lg-end">
                    <a class="btn btn-danger" href="{{ url('home/properti') }}">Beli Sekarang Juga!</a>
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

    <section id="faq" class="faq-section">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center faq-title">
                <h2>Sering Ditanyakan</h2>
                <p>Berikut ini beberapa pertanyaan yang sering ditanyakan kepada kami. Jika kamu masih ada hal yang ingin
                    ditanyakan, silakan hubungi marketing kami.</p>
            </div>
            <div class="accordion" id="faqAccordion">
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-info-circle"
                            aria-hidden="true"></i>
                        Apakah Sudah Siap Huni?
                    </button>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                        <div class="card-body">
                            Saat ini kami menggunakan sistem inden (pesan bangun). Setelah kamu melakukan pembayaran DP dan
                            biaya lain-lain, rumah segera dibangun. Untuk program subsidi, rumah sudah dibangun 80% sebelum
                            akad bank. Jadi, setelah akad bank dan pengajuan KPR disetujui, rumah bisa langsung ditempati.
                        </div>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-info-circle"
                            aria-hidden="true"></i>
                        Berapa Biaya Awal Hingga Terima Kunci?
                    </button>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            Biaya sampai terima kunci kurang lebih 35 juta. Untuk rincian biaya, silakan hubungi marketing
                            kami.
                        </div>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-info-circle"
                            aria-hidden="true"></i>
                        Bagaimana cara melakukan booking awal melalui website?
                    </button>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                        <div class="card-body">
                            1. Buat akun terlebih dahulu untuk pengguna baru, apabila sudah memiliki akun maka login
                            terlebih dahulu dengan akun yang sudah anda buat.
                            <br>
                            2. Setelah itu pilih properti yang ingin anda beli pada halaman properti sebelum anda
                            membeli properti yang akan dibeli pastikan sesuai dengan apa yang anda inginkan.
                            <br>
                            3. Pilih Beli sekarang untuk memasukan kedalam keranjang lalu lakukan checkout pembelian.
                            <br>
                            4. Lakukan upload bukti pembayaran serta lakukan pemberkasan untuk melakukan pengajuan KPR.
                            <br>
                            5. Setelah melakukan upload bukti pembayaran tunggu hingga pihak marketing mengkonfirmasi
                            pembelian anda.
                        </div>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-info-circle"
                            aria-hidden="true"></i>
                        Bagaimana Cara Pemesanan?
                    </button>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                        <div class="card-body">
                            Untuk pemesanan, Anda bisa datang ke lokasi perumahan untuk survei terlebih dahulu atau anda
                            dapat melihat melalui website kami yang dimana sudah terdapat beberapa vitur seperti virtual
                            tour. Kemudian,
                            Anda bisa pilih unit rumah yang diinginkan dan menyelesaikan administrasi di kantor
                            pemasaran
                            atau melalui website ini.
                        </div>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive"><i class="fa fa-info-circle"
                            aria-hidden="true"></i>
                        Apa Saja Persyaratannya?
                    </button>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFve" data-parent="#faqAccordion">
                        <div class="card-body">
                            Persyaratan pengajuan KPR (Kredit Pemilikan Rumah) : Foto 3×4 (suami istri), Foto E-KTP,
                            Fotokopi buku nikah, Fotokopi Kartu Keluarga, Rekening Koran Tabungan 3 bulan terakhir, slip
                            gaji asli 3 bulan terakhir, Fotokopi NPWP, Surat Keterangan kerja/SK pegawai. Dan tambahan
                            dokumen bagi wirausaha : Gambar Denah lokasi usaha, Fotokopi SIUP/TDP/SKU, dan Laporan
                            Keuangan
                            usaha 3 bulan terakhir.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="py-4">
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
    </section> --}}
@endsection
