@extends('agent.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $key => $pecah)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pecah->nama }}</td>
                                    <td>{{ $pecah->email }}</td>
                                    <td>
                                        @php
                                            $phoneNumber = $pecah->telepon;
                                            if (!startsWith($phoneNumber, '+')) {
                                                $countryCode = '+62';
                                                $phoneNumber = $countryCode . $phoneNumber;
                                            }
                                        @endphp
                                        <a target="_blank" href="https://wa.me/{{ $phoneNumber }}">{{ $pecah->telepon }}</a>
                                    </td>
                                    <td>{{ $pecah->alamat }}</td>
                                    {{-- <td>
                                        <a href="{{ url('agent/hapuspengguna/' . $pecah->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Hapus Data?')">Hapus</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php
        function startsWith($haystack, $needle)
        {
            return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
        }
    @endphp
@endsection
