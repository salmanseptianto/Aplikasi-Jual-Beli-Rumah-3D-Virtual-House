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

    <script src="https://cdn.tiny.cloud/1/fv2ubf6ezkg9u0rd06kr19yznpajx1qe0u0hds2a1s3e48ow/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah blog</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/simpanblog') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
                            <script>
                                tinymce.init({
                                    selector: '#deskripsi',
                                    height: 500,
                                    menubar: false,
                                    plugins: [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen',
                                        'insertdatetime media table paste code help wordcount'
                                    ],
                                    toolbar: 'undo redo | formatselect | bold italic backcolor | \
                                                                                                                                      alignleft aligncenter alignright alignjustify | \
                                                                                                                                      bullist numlist outdent indent | removeformat | help'
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto"
                                accept="image/jpeg, image/png, image/jpg, image/gif">
                        </div>
                        <button type="submit" class="btn btn-danger"><i></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
