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

    <form class="text-center mt-5" action="{{ route('properti.search') }}" method="GET" class="form-inline">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cari properti...">
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="alert alert-warning" role="alert">
                        Maaf, properti tidak ditemukan.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
