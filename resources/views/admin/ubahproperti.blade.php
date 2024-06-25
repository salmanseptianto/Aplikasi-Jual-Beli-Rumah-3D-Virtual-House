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
                    <h6 class="m-0 font-weight-bold text-primary">Rubah Properti</h6>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url('admin/updateproperti/' . $properti->idproperti) }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $properti->namaproperti }}">
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="text" class="form-control" name="harga"
                                value="{{ $properti->hargaproperti }}">
                        </div>
                        <div class="form-group">
                            <label>Kamar Tidur</label>
                            <input type="text" class="form-control" name="kamartidur"
                                value="{{ $properti->kamartidur }}">
                        </div>
                        <div class="form-group">
                            <label>Kamar Mandi</label>
                            <input type="text" class="form-control" name="kamarmandi"
                                value="{{ $properti->kamarmandi }}">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe">
                                <option value="{{ $properti->tipe }}">{{ $properti->tipe }} (dipilih)</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                                <option value="54">54</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Luas</label>
                            <select class="form-control" name="luas">
                                <option value="{{ $properti->luas }}">{{ $properti->luas }} (dipilih) </option>
                                <option value="60">60 m²</option>
                                <option value="84">84 m²</option>
                                <option value="98">98 m²</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Perumahan</label>
                            <select class="form-control" name="perumahan">
                                <option value="{{ $properti->perumahan }}">{{ $properti->perumahan }} (dipilih)</option>
                                <option value="Subsidi">Subsidi</option>
                                <option value="Komersil">Komersil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="editor" rows="10">{{ $properti->deskripsiproperti }}</textarea>
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
                            <label>Detail Properti</label>
                            <p class="alert alert-danger">* rubah Deskripsi sesuai kebutuhan anda !!!</p>
                            <div class="align-items-center">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-home" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <select class="form-control" name="daerah">
                                            <option value="" disabled selected>Kapling
                                            </option>
                                            <?php
                                            $letters = range('A', 'T');
                                            
                                            foreach ($letters as $letter) {
                                                echo "<option value='$letter'>$letter</option>";
                                            }
                                            ?>
                                        </select>
                                        <select class="form-control" name="nomer">
                                            <option value="{{ $properti->nomer }}" disabled selected>
                                                Nomer</option>
                                            @for ($i = 1; $i <= 47; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $properti->nomer == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>link 3D</label>
                            <input type="text" class="form-control" name="links" value="{{ $properti->links }}">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="letak-input" style="margin-bottom: 10px;">
                                <input type="file" class="form-control" name="foto"
                                    accept="image/jpeg, image/png, image/jpg, image/gif">
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
