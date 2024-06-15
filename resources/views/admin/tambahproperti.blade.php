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

    <script src="https://cdn.tiny.cloud/1/fv2ubf6ezkg9u0rd06kr19yznpajx1qe0u0hds2a1s3e48ow/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Properti</h6>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ url('admin/simpanproperti') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="text" class="form-control" name="harga">
                        </div>

                        <div class="form-group">
                            <label>Kamar Tidur</label>
                            <input type="text" class="form-control" name="kamartidur">
                        </div>
                        <div class="form-group">
                            <label>Kamar Mandi</label>
                            <input type="text" class="form-control" name="kamarmandi">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" class="form-control" name="tipe">
                        </div>

                        <div class="form-group">
                            <label>Fitur</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10">
                                Dijual Rumah Baru di Perumahan Triehans Village Tanjung Kab.Brebes. Lokasi Rumah strategis dekat kemana2, Lingkungan perumahan tenang aman nyaman dan bebas banjir
                            </textarea>
                            <script>
                                CKEDITOR.replace('deskripsi');
                            </script>
                        </div>
                        <script>
                            tinymce.init({
                                selector: 'textarea#deskripsi',
                                height: 500,
                                menubar: false,
                                plugins: [
                                    'advlist autolink lists link image charmap print preview anchor',
                                    'searchreplace visualblocks code fullscreen',
                                    'insertdatetime media table paste code help wordcount'
                                ],
                                toolbar: 'undo redo | formatselect | ' +
                                    'bold italic backcolor | alignleft aligncenter ' +
                                    'alignright alignjustify | bullist numlist outdent indent | ' +
                                    'removeformat | help'
                            });
                        </script>

                        <div class="form-group">
                            <label>Detail Properti</label>
                            <p class="alert alert-danger">* rubah Deskripsi sesuai kebutuhan anda !!!</p>
                            <textarea class="form-control" name="fitur" id="editor" rows="10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Luas Bangunan : </span>isi sesuai luas bangunan anda</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Luas Tanah : </span>isi sesuai luas tanah anda</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Kondisi Bangunan : </span>BAIK/BAGUS/BAGUS SEKALI</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Menghadap : </span>SELATAN</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Jumlah Lantai : </span>2 LANTAI</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Sertifikat : </span>HAK MILIK</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Interior  : </span>No</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Saluran Telepon : </span>YES</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Listrik : </span>YES</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Supply Air : </span>Air Pam / Air Tanah</li>
                                            <li class="mb-3"><span class="text-secondary font-weight-bold">Jalur Mobil : </span>YES</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </textarea>
                            <script>
                                tinymce.init({
                                    selector: 'textarea#editor',
                                    height: 500,
                                    menubar: false,
                                    plugins: [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen',
                                        'insertdatetime media table paste code help wordcount'
                                    ],
                                    toolbar: 'undo redo | formatselect | ' +
                                        'bold italic backcolor | alignleft aligncenter ' +
                                        'alignright alignjustify | bullist numlist outdent indent | ' +
                                        'removeformat | help'
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label>link 3D</label>
                            <input type="text" class="form-control" name="links" id="links" rows="100"></input>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="letak-input" style="margin-bottom: 10px;">
                                <input type="file" class="form-control"
                                    name="foto"accept="image/jpeg, image/png, image/jpg, image/gif">
                            </div>
                        </div>
                        <button class="btn btn-danger" name="save"><i
                                class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
