@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2">Home <i
                                class="fa fa-chevron-right"></i></span><span>Detail Blog <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Detail Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('foto/' . $blog->foto) }}" class="image-popup prod-img-bg"><img
                            src="{{ asset('foto/' . $blog->foto) }}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-9 product-details pl-md-6 ftco-animate">
                    <h1 class="text-bold text-uppercase text-">{{ $blog->judul }}</h1>
                    <p class="mb-sm-0">Artikel ini terbit pada Hari : {!! $blog->tanggal !!} </p>
                    <div>
                        <p id="CounterVisitor{{ $blog->idblog }}" class="mb-0">
                            <i class="fa fa-eye mr-1" aria-hidden="true"></i>
                            <span id="counterValue{{ $blog->idblog }}"></span> views
                        </p>
                    </div>
                    <script>
                        var n{{ $blog->idblog }} = localStorage.getItem('on_load_counter{{ $blog->idblog }}');

                        if (n{{ $blog->idblog }} === null) {
                            n{{ $blog->idblog }} = 0;
                        }
                        n{{ $blog->idblog }}++;

                        localStorage.setItem("on_load_counter{{ $blog->idblog }}", n{{ $blog->idblog }});

                        nums{{ $blog->idblog }} = n{{ $blog->idblog }}.toString().split('').map(Number);
                        var counterValue{{ $blog->idblog }} = nums{{ $blog->idblog }}.map(num => '<span class="counter-item">' + num +
                            '</span>').join('');
                        document.getElementById('counterValue{{ $blog->idblog }}').innerHTML = counterValue{{ $blog->idblog }};
                    </script>

                    <hr>
                    <p>{!! $blog->deskripsi !!} </p>
                </div>
            </div>
        </div>
    </section>
@endsection
