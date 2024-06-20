@extends('agent.templates.index')

@section('page-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url('agent/tambahblog') }}" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Blog</a>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Blog</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($blogs as $b)
                                <tr>
                                    <td>{{ $nomor }}</td>
                                    <td>{{ $b->judul }}</td>
                                    <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">
                                        {{ Str::limit($b->deskripsi, 25) }}
                                    </td>
                                    
                                    <td>
                                        <img src="{{ asset('foto/' . $b->foto) }}" width="100px">
                                    </td>
                                    <td>
                                        <a href="{{ url('agent/ubahblog/' . $b->idblog) }}" class="btn btn-warning">Ubah</a>
                                        <a href="{{ url('agent/hapusblog/' . $b->idblog) }}" class="btn btn-danger"
                                            onclick="confirmDeletion(event, '{{ url('agent/hapusblog/' . $b->idblog) }}')">Hapus</a>
                                    </td>
                                </tr>
                                <?php $nomor++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
