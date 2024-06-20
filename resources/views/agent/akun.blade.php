@extends('agent.templates.index')

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

    <section id="home-section" class="hero">
        <form method="post" enctype="multipart/form-data" action="{{ url('agent/ubahakun/' . $pengguna->id) }}">
            @csrf
            <div class="container mt-4">
                <div class="row">
                    <div class="position-relative mx-auto d-block">
                        <div class="rounded-circle border border-dark" style="width: 200px; height: 200px; overflow: hidden;">
                            <img src="{{ asset('foto/' . $pengguna->fotoprofil) }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="Foto Profil Pengguna">
                        </div>
                        <div class="mt-4">
                            <input type="file" name="fotoprofil" accept="image/jpeg, image/png, image/jpg, image/gif">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input value="{{ $pengguna->nama }}" type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="{{ $pengguna->email }}" type="email" class="form-control" name="email" readonly>
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
                    <input type="password" class="form-control" name="password">
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
