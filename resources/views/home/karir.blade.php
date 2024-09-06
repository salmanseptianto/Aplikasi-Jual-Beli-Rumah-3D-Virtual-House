@extends('home.templates.index')

@section('page-content')
    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/images/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h2 class="mb-0 bread">Karir</h2>
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Info Loker <i class="fa fa-chevron-right"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center mt-5">
        <div class="alert">
            <h1 class="display-4 text-warning">
                <i class="bi bi-exclamation-triangle"></i> Mohon Maaf
            </h1>
            <p class="lead">Untuk saat ini, belum ada lowongan kerja.</p>
        </div>
    </section>
@endsection
