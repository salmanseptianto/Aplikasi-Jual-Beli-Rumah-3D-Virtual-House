@extends('admin.templates.index')

@section('page-content')
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
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Agent</h6>
                </div>
                <section id="home-section" class="ftco-section">
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-5 my-auto">
                                <img width="100%" src="{{ asset('foto/loginn.png') }}">
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

                                <form action="{{ url('admin/simpanpengguna') }}" method="POST" enctype="multipart/form-data">
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
            </div>
        </div>
    </div>
@endsection
