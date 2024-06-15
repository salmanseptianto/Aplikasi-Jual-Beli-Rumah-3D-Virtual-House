@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Keranjang </span>
                    </p>
                    <h2 class="mb-0 bread">Keranjang</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-danger text-white">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Properti</th>
                                        <th>Foto Properti</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @if (!empty(session('keranjang')))
                                        @foreach ($keranjang as $idproperti => $jumlah)
                                            @php
                                                $properti = DB::table('properti')
                                                    ->where('idproperti', $idproperti)
                                                    ->first();
                                                $totalharga = $properti->hargaproperti * $jumlah;
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $nomor }}</td>
                                                <td>{{ $properti->namaproperti }}</td>
                                                <td class="image-prod">
                                                    <img src="{{ asset('foto/' . $properti->fotoproperti) }}" width="100px"
                                                        style="border-radius: 10px;">
                                                </td>
                                                <td>Rp {{ number_format($properti->hargaproperti) }}</td>
                                                <td>
                                                    <a href="{{ url('home/hapuskeranjang/' . $properti->idproperti) }}"
                                                        class="btn btn-danger btn-xs">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Keranjang Kosong</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="text-center">
                        <a href="{{ url('home/properti') }}" class="btn btn-warning btn-lg mr-2"><i
                                class="fa fa-cart-plus mr-2"></i>Lanjutkan Belanja</a>
                        @if (!empty(session('keranjang')))
                            <a href="{{ url('home/checkout') }}" class="btn btn-danger btn-lg">Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </section>
@endsection
