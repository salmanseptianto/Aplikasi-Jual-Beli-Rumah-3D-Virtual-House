@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Properti <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Properti</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center mt-5">
        <a href="{{ asset('assets/home/images/kapling.jpg') }}" target="_blank" class="btn btn-info rounded-pill px-4 py-2">
            <h4 class="m-0 text-white">Lihat Kapling</h4>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                            <label class="btn btn-outline-success">
                                <input type="radio" name="filter" id="jual" autocomplete="off" value="jual"> Jual
                            </label>
                            <label class="btn btn-outline-success">
                                <input type="radio" name="filter" id="sewa" autocomplete="off" value="sewa"> Sewa
                            </label>
                            <label class="btn btn-outline-success">
                                <input type="radio" name="filter" id="baru" autocomplete="off" value="baru">
                                Property Baru
                            </label>
                        </div>
                        <form action="{{ route('properti.search') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-home"></i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Tipe Rumah">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-money"></i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Range Harga">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="search"
                                            value="{{ request()->input('search') }}"
                                            placeholder="Cari berdasarkan lokasi, ID, Property">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success mb-2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section class="ftco-section">
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
        @php
            $currentPage = $propertis->currentPage();
            $lastPage = $propertis->lastPage();
        @endphp
        <div class="container">
            <div class="row">
                @if ($propertis->count() > 0)
                    @foreach ($propertis as $p)
                        <div class="col-md-4 d-flex">
                            <div class="product ftco-animate">
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="background-image: url('{{ asset('foto/' . $p->fotoproperti) }}');">
                                </div>
                                <div class="text text-center">
                                    <p class="property-title">{{ $p->namaproperti }}</p>
                                    <p class="property-price">IDR. {{ number_format($p->hargaproperti, 0, ',', '.') }}</p>
                                </div>
                                <div class="property-info">
                                    <div class="property-feature">
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <span class="property-bedrooms">{{ $p->kamartidur }} Kamar Tidur</span>
                                    </div>
                                    <div class="property-feature">
                                        <i class="fa fa-bath" aria-hidden="true"></i>
                                        <span class="property-bathrooms">{{ $p->kamarmandi }} Kamar Mandi</span>
                                    </div>
                                    <div class="property-feature">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <span class="property-area">{{ $p->tipe }}m<sup>2</sup></span>
                                    </div>
                                </div>

                                <div class="text text-center">
                                    <a href="{{ url('home/detail/' . $p->idproperti) }}">
                                        <button type="submit" class="btn btn-danger float-none">Buy Now</button>
                                    </a>
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
            <!-- Pagination -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            @if ($currentPage > 1)
                                <li class="page-item"><a class="page-link"
                                        href="{{ $propertis->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif
                            @for ($i = 1; $i <= $lastPage; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}"><a class="page-link"
                                        href="{{ $propertis->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ($currentPage < $lastPage)
                                <li class="page-item"><a class="page-link"
                                        href="{{ $propertis->nextPageUrl() }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
