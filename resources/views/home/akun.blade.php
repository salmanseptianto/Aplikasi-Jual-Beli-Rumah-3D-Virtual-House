@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Akun </span></p>
                    <h2 class="mb-0 bread">Akun</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">

        <form method="post" enctype="multipart/form-data" action="{{ url('home/ubahakun/' . $pengguna->id) }}">
            @csrf
            <div class="container mt-4">
                <div class="row">
                    <div class="position-relative mx-auto d-block">
                        <div class="rounded-circle border border-dark"
                            style="width: 200px; height: 200px; overflow: hidden;">
                            <img src="{{ asset('foto/' . $pengguna->fotoprofil) }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="Foto Profil Pengguna">
                        </div>
                        <div class="mt-4">
                            <input type="file" name="fotoprofil" accept="image/jpeg, image/png, image/jpg, image/gif">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                @if ($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Errors',
                                html: '<ul style="list-style-type: none; padding-left: 0;">' +
                                    @foreach ($errors->all() as $error)
                                        '<li>{{ $error }}</li>' +
                                    @endforeach
                                '</ul>',
                                icon: 'error',
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
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input value="{{ $pengguna->nama }}" type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="{{ $pengguna->email }}" type="text" class="form-control" name="email" readonly>
                    <span class="text-danger">* Email tidak dapat dirubah !!</span>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input value="{{ $pengguna->telepon }}" type="text" class="form-control" name="telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="5">{{ $pengguna->alamat }}</textarea>
                    <script>
                        CKEDITOR.replace('alamat');
                    </script>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password">
                    <input type="hidden" class="form-control" name="passwordlama" value="{{ $pengguna->password }}">
                    <span class="text-primary">Kosongkan Password jika tidak ingin mengganti</span>
                </div>
                <button class="btn btn-danger float-right pull-right" name="ubah"><i
                        class="glyphicon glyphicon-saved"></i>Simpan</button>
            </div>
            </div>
            <br>
            <br>
        </form>
    </section>
@endsection
