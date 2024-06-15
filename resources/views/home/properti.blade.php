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

    <form class="text-center mt-5" action="{{ route('properti.search') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cari properti..."
                value="{{ request()->input('search') }}">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">Cari</button>
            </div>
        </div>
    </form>

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
                                    <h2>{{ $p->namaproperti }}</h2>
                                    <p class="mb-0">
                                        <span class="price price-sale"></span>
                                        <span class="price">Rp {{ number_format($p->hargaproperti) }}</span>
                                    </p>
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
                                <li class="page-item"><a class="page-link" href="{{ $propertis->nextPageUrl() }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
