@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Detail Properti <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Detail Properti</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('foto/' . $properti->fotoproperti) }}" class="image-popup prod-img-bg"><img
                            src="{{ asset('foto/' . $properti->fotoproperti) }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-9 product-details pl-md-6 ftco-animate">
                    <h1 class="text-bold text-uppercase text-">{{ $properti->namaproperti }}</h1>
                    <h1 class="price"><span class="text-normal">Rp. {{ number_format($properti->hargaproperti) }}</span>
                    </h1>
                    <br>
                    <h4>Deskripsi</h4>
                    <hr>
                    <p>{!! $properti->deskripsiproperti !!} </p>
                    <h4>Detail Properti</h4>
                    <hr>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">ID Listing</div>
                                    <div class="col-6">{{ $properti->tipe }}{{ $properti->idproperti }}</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Tipe</div>
                                    <div class="col-6">{{ $properti->tipe }}/{{ $properti->luas }}</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Luas Bangunan</div>
                                    <div class="col-6">{{ $properti->tipe }}m<sup>2</sup></div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Luas Tanah</div>
                                    <div class="col-6">{{ $properti->luas }}m<sup>2</sup></div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Harga DP</div>
                                    <div class="col-6">Rp
                                        {{ number_format($properti->hargaproperti / 100 + 500000, 0, ',', '.') }}</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Kondisi Bangunan</div>
                                    <div class="col-6">Baru</div>
                                </div>
                                {{-- <div class="item row">
                                    <div class="col-6 font-weight-bold">Lokasi Kapling</div>
                                    <div class="col-6">{{$properti->daerah}}-{{$properti->nomer}}</div>
                                </div> --}}
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Jalur Mobil</div>
                                    <div class="col-6">Ya</div>
                                </div>

                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Terdaftar pada</div>
                                    <div class="col-6">{{$properti->tanggal}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Interior</div>
                                    <div class="col-6">Tak berperabot</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Kamar Tidur</div>
                                    <div class="col-6">2</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Kamar Mandi</div>
                                    <div class="col-6">1</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Ruang Tamu</div>
                                    <div class="col-6">1</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Garasi</div>
                                    <div class="col-6">0</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Carport</div>
                                    <div class="col-6">1</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Jenis Perumahan</div>
                                    <div class="col-6">{{$properti->perumahan}}</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Listrik</div>
                                    <div class="col-6">1300 W</div>
                                </div>
                                <div class="item row">
                                    <div class="col-6 font-weight-bold">Air Pam / Tanah</div>
                                    <div class="col-6">Air Pam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <p>{!! $properti->nomer !!} </p> --}}
                </div>
                <div class="col-lg-6 product-details ftco-animate">
                    <form method="post" action="{{ url('home/pesan') }}">
                        @csrf
                        <input type="hidden" name="idproperti" value="{{ $properti->idproperti }}">
                        <div class="form-group">
                            <input type="hidden" placeholder="Masukkan Jumlah Disini" value="1" class="form-control"
                                name="jumlah" required></input>
                            <br>
                            <button class="btn btn-success btn-lg float-right" name="beli">
                                <i class="fa fa-shopping-cart mr-2"></i>
                                Beli Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-2">View 3D</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $properti->links }}" allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
