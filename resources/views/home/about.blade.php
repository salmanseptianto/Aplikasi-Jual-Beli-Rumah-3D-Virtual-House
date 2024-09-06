@extends('home.templates.index')

@section('page-content')
    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/images/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Tentang Kami <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Tentang Kami</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="home-section" class="ftco-section">
        <div class="container py-2">
            <div class="row">
                <!-- Gambar Profil -->
                <div class="col-md-6 mb-4 d-flex justify-content-center">
                    <div class="text-center">
                        <img src={{ asset('foto/images/owner.png') }} class="img-fluid"
                            alt="Heri Agus Nur Rohman, S.P. (Owner HR Group)">
                        <figcaption class="mt-2">Heri Agus Nur Rohman, S.P. (Owner HR Group)</figcaption>
                    </div>
                </div>

                <!-- Konten Visi dan Misi -->
                <div class="col-md-6 text-center"> <!-- Changed text-align-center to text-center -->
                    <div class="mb-4">
                        <h2 class="mb-3 font-weight-bold">Visi</h2>
                        <p>Innasholati wanusuki wamahyaya wamamati lillahirobbila’lamin</p>
                    </div>
                    <div>
                        <h2 class="mb-3 font-weight-bold">Misi</h2>
                        <p>Membangun Kerajaan Bisnis Untuk Kepentingan Dakwah dan Mensejahterakan Umat</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <!-- About Company Heading -->
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold">Tentang Perusahaan</h2>
                </div>
            </div>

            <!-- About Company Content -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <p><strong>HR GROUP</strong> adalah perusahaan yang didirikan dengan tujuan untuk menjalankan usaha di
                        bidang pengembangan properti bersubsidi dan real estate.</p>
                    <p>Didirikan oleh Bapak H. Heri Agus Nur Rokhman (Owner) dan Ibu Yeni Varita (Direktur) HR Group serta
                        didukung dengan pengalaman yang cukup banyak di bidang manajemen properti, HR Group akan menjadi
                        perusahaan yang terkenal atas kualitas produk perumahannya.</p>
                    <p>Kami merupakan perusahaan holding yang menaungi beberapa PT yang lain, seperti:</p>
                    <ul>
                        <li>PT. HR Mitra Propertindo</li>
                        <li>PT. Kuasa Triehans Semesta</li>
                    </ul>
                </div>
            </div>

            <!-- Company History Heading -->
            <div class="row mb-xl-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold">Sejarah Berdirinya HR GROUP</h2>
                </div>
            </div>

            <!-- Company History Text -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <p>Diawali tahun 2018 dengan membangun sebuah perumahan sederhana di Wilayah Brebes Kota – Jawa Tengah,
                        HR GROUP telah bertumbuh dalam melayani kebutuhan konsumen khususnya perumahan di beberapa kecamatan
                        di wilayah Kabupaten Brebes – Jawa Tengah.</p>
                    <p>Dengan tekad yang kuat sebagaimana nilai dasar HR GROUP serta kesungguhan dalam mewujudkan komitmen
                        untuk memenuhi setiap harapan konsumen, HR Group telah menjelma menjadi salah satu perusahaan
                        properti berkembang khususnya di Kab.Brebes dengan menguasai pasar pada segmen menengah kebawah
                        melalui rumah SUBSIDI.</p>
                    <p>Melalui semangat dan cita-cita membawa keberkahan dan manfaat sebesar-besarnya kepada sesama, saat
                        ini HR GROUP telah bertransformasi menjadi pendamping dan mitra pertumbuhan usaha mikro dan menengah
                        di wilayah Brebes.</p>
                    <p>Tentunya semua upaya tersebut diharapkan dapat menghantarkan HR GROUP menjadi salah satu perusahaan
                        properti yang terus berkembang mewujudkan Program Pemerintah dengan rumah murah / SUBSIDI dan Real
                        Estate.</p>
                </div>
            </div>

            <!-- Images Section -->
            <div class="row mb-3">
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/Rapat-Rutin-Pekanan-1024x575.jpeg"
                        class="img-fluid rounded equal-height" alt="Rapat Rutin Pekanan">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/09/Gambar-WhatsApp-2024-09-02-pukul-10.03.02_bcadf938-1024x768.jpg"
                        class="img-fluid rounded equal-height" alt="Inspirasi Pagi HR GROUP">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/Family-Gathering-HR-Group-Guci-Safana-Tahun-2023-1024x576.jpeg"
                        class="img-fluid rounded equal-height" alt="Rapat Rutin Pekanan">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/Family-Gathering-Woodland-Kuningan-2024-1024x575.jpeg"
                        class="img-fluid rounded equal-height" alt="Inspirasi Pagi HR GROUP">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/Senam-Bersama-1024x575.jpeg"
                        class="img-fluid rounded equal-height" alt="Rapat Rutin Pekanan">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/Family-Gathering-Woodland-Kuningan-2024-2-1024x575.jpeg"
                        class="img-fluid rounded equal-height" alt="Inspirasi Pagi HR GROUP">
                </div>
            </div>



            <!-- Team Heading -->
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold">TEAM KAMI</h2>
                </div>
            </div>

            <!-- Team Members -->
            <div class="row justify-content-center">
                <div class="col-md-4 d-flex flex-column align-items-center text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/1-Cecep-Setiawan-Genderal-Manager-1.jpg"
                        class="img-fluid rounded" alt="Cecep Setiawan - General Manager">
                    <p class="mt-2">Cecep Setiawan - General Manager</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/2-Kalimi-Manager-Teknik.png"
                        class="img-fluid rounded" alt="Kalimi - Manager Teknik">
                    <p class="mt-2">Kalimi - Manager Teknik</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/3-Iwan-S-Manager-Marketing.png"
                        class="img-fluid rounded" alt="Iwan S - Manager Marketing">
                    <p class="mt-2">Iwan S - Manager Marketing</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/08/pak-nanto-1024x1024.jpg"
                        class="img-fluid rounded" alt="Iwan S - Manager Marketing">
                    <p class="mt-2">Sunanto - Manager Marketing</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/5-Slamet-R-Manager-Legal.png"
                        class="img-fluid rounded" alt="Slamet R - Manager Legal">
                    <p class="mt-2">Slamet R - Manager Legal</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <img src="https://hrgroupsukses.com/wp-content/uploads/2024/07/6-Rokhmah-Manager-Keuangan.png"
                        class="img-fluid rounded" alt="Rokhmah - Manager Keuangan">
                    <p class="mt-2">Rokhmah - Manager Keuangan</p>
                </div>
            </div>
        </div>
    </section>
@endsection
