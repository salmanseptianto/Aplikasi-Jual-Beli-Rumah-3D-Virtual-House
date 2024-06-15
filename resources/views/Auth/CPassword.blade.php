@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0">
                        <span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Ganti Password <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Ganti Password</h2>
                </div>
            </div>
        </div>
    </section>


    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let errorMessage = '<ul>';
                @foreach ($errors->all() as $error)
                    errorMessage += '<li style="list-style: none;">{{ $error }}</li>';
                @endforeach
                errorMessage += '</ul>';
                Swal.fire({
                    title: 'Error',
                    html: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if (session('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Notification',
                    text: '{{ session('alert') }}',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    <section id="home-section" class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group" style="display: none;">
                            <label>Token</label>
                            <input type="text" name="token" class="form-control" value="{{ $token }}" required
                                readonly>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger btn-block" name="simpan">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
