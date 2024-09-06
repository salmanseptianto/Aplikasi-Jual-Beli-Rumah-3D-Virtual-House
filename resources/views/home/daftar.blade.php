@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/images/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h2 class="mb-0 bread">Daftar</h2>
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Daftar <i class="fa fa-chevron-right"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="ftco-section">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5 my-auto">
                    <img width="100%" src="{{ asset('foto/images/loginn.png') }}">
                </div>
                <div class="col-md-7">

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

                    <form action="{{ url('home/dodaftar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masukan Image</label>
                            <input type="file" name="foto"
                                class="form-control"accept="image/jpeg, image/png, image/jpg, image/gif">
                        </div>
                        {{--                         
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="kelamin">
                                <option value="Laki - Laki" {{ old('kelamin') == 'Laki - Laki' ? 'selected' : '' }}>Laki
                                    - Laki</option>
                                <option value="Perempuan" {{ old('kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div> --}}



                        {{-- <label>JENIS KELAMIN</label><br>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="kelamin_laki" name="kelamin"
                                    value="Laki - Laki">
                                <label class="form-check-label" for="kelamin_laki">Lanang</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="kelamin_perempuan" name="kelamin"
                                    value="Perempuan">
                                <label class="form-check-label" for="kelamin_perempuan">Wadon</label>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control " name="alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telepon</label>
                            <input type="number" name="telepon" class="form-control">
                        </div>
                        <div class="form-group ">
                            <br>
                            <button class="btn btn-danger btn-block" name="daftar">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
