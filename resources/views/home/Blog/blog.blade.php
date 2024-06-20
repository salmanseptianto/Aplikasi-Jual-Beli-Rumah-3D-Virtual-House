@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0">
                        <span class="mr-2">Home <i class="fa fa-chevron-right"></i></span>
                        <span>Detail Blog <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Detail Blog</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $p)
                    <div class="col-md-4 d-flex">
                        <a href="{{ url('home/isiblog/' . $p->idblog) }}">
                            <div class="product ftco-animate">
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="background-image: url('{{ asset('foto/' . $p->foto) }}');">
                                </div>
                                <div class="text text-center">
                                    <h2>{{ Str::limit($p->judul, 40) }}</h2>
                                    <span>{{ $p->tanggal }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
