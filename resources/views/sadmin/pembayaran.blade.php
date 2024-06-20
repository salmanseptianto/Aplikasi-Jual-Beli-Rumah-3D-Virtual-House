@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h6>
                    <button onclick="printPage()">unduh</button>
                    <script>
                        function printPage() {
                            window.print();
                        }
                    </script>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td><strong>No. Pembelian</strong></td>
                                    <td>{{ $datapembelian->idpembelian }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{ tanggal(date('Y-m-d', strtotime($datapembelian->tanggalbeli))) }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $datapembelian->statusbeli }}</td>
                                </tr>

                                <tr>
                                    <td>Total Pembayaran DP</td>
                                    <td>Rp. {{ number_format($datapembelian->totalbeli) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>{{ $datapembelian->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>{{ $datapembelian->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $datapembelian->email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $datapembelian->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Properti</th>
                                <th>Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($dataproperti as $dp)
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td>{{ $dp->nama }}</td>
                                    <td>Rp. {{ number_format($dp->harga) }}</td>
                                </tr>
                                <?php $nomor++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if (
            $datapembelian->statusbeli != 'Pesanan Di Tolak' &&
                $datapembelian->statusbeli != 'Belum Bayar' &&
                $datapembelian->statusbeli != 'Selesai')
            <div class="col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <th>{{ $pembayaran->nama }}</th>
                                    </tr>
                                    {{-- @foreach ($pengguna as $p) --}}
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>{{ $pengguna->kelamin }}</th>
                                    </tr>
                                    {{-- @endforeach --}}

                                    <tr>
                                        <th>Tanggal Transfer</th>
                                        <th>{{ tanggal(date('Y-m-d', strtotime($pembayaran->tanggaltransfer))) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Upload Bukti Pembayaran</th>
                                        <th><?= tanggal(date('Y-m-d', strtotime($pembayaran->tanggal))) ?></th>
                                    </tr>
                                </table>
                                <form method="post"
                                    action="{{ url('admin/simpanpembayaran/' . $datapembelian->idpembelian) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="statusbeli">
                                            <option <?php if ($datapembelian->statusbeli == 'Belum di Konfirmasi') {
                                                echo 'selected';
                                            } ?> value="Belum di Konfirmasi">Belum di Konfirmasi
                                            </option>
                                            <option <?php if ($datapembelian->statusbeli == 'Pesanan Di Tolak') {
                                                echo 'selected';
                                            } ?> value="Pesanan Di Tolak">Pesanan Di Tolak</option>
                                            <option <?php if ($datapembelian->statusbeli == 'Di Terima, Silahkan ke Kantor kami') {
                                                echo 'selected';
                                            } ?> value="Di Terima, Silahkan ke Kantor kami">Di
                                                Terima, Silahkan ke Kantor kami</option>
                                            <option <?php if ($datapembelian->statusbeli == 'Selesai') {
                                                echo 'selected';
                                            } ?> value="Selesai">Selesai</option>

                                        </select>
                                    </div>
                                    <button class=" btn btn-danger float-right pull-right" name="proses">Simpan</button>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->bukti, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->bukti) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->bukti) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KTP</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->ktp, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->ktp) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->ktp) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KARTU KELUARGA</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->kk, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->kk) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->kk) }}" alt="Rekening Image" class="img-responsive"
                                    width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">SURAT NIKAH</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->suratnikah, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->suratnikah) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->suratnikah) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">NPWP</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->npwp, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->npwp) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->npwp) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">BPJS</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->bpjs, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->bpjs) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->bpjs) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">SURAT KETERANGAN KERJA</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->sk, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->sk) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->sk) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">GAJI</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->gaji, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->gaji) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->gaji) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">REKENING KORAN</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (str_ends_with($pembayaran->rekening, '.pdf'))
                                <a href="{{ url('foto/' . $pembayaran->rekening) }}" target="_blank">View PDF</a>
                            @else
                                <img src="{{ url('foto/' . $pembayaran->rekening) }}" alt="Rekening Image"
                                    class="img-responsive" width="100%">
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
