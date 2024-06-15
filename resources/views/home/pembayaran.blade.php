@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="product.html">Pembayaran <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h2 class="mb-0 bread">Pembayaran</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="ftco-section">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <table class="">
                        <tr>
                            <td width="150px"><strong>No. Pembelian</strong></td>
                            <td>: {{ $datapembelian->idpembelian }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ tanggal(date('Y-m-d', strtotime($datapembelian->tanggalbeli))) }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $datapembelian->statusbeli }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: Rp. {{ number_format($datapembelian->totalbeli) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="">
                        <tr>
                            <td width="150px"><strong>Nama</strong></td>
                            <td>: {{ $datapembelian->nama }}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: {{ $datapembelian->telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $datapembelian->email }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $datapembelian->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Properti</th>
                                            <th>Harga Booking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        @foreach ($dataproperti as $dp)
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td>{{ $dp->nama }}</td>
                                                <td>{{ number_format($datapembelian->totalbeli) }}</td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-5">
                    <img width="100%" src="{{ asset('foto/bayar.webp') }}">
                </div>
                <div class="col-md-7">
                    <p>Kirim Bukti Pembayaran</p>
                    <b>No Rek : 0123 4567 89 (Bank BRI, Atas Nama : Heri Agus Nur Rokhman)</b>
                    <br>
                    <br>
                    <div class="alert alert-info">Total Tagihan Anda : <strong>Rp.
                            {{ number_format($datapembelian->totalbeli) }}</strong></div>

                    <form method="post" enctype="multipart/form-data" action="{{ url('home/pembayaransimpan') }}">
                        @csrf
                        <input type="hidden" value="{{ $datapembelian->idpembelian }}" name="idpembelian">
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukan Nama Rekening Anda" required>
                            {{-- value="{{ session('pengguna')->nama }}" required> --}}
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transfer</label>
                            <input type="date" name="tanggaltransfer" class="form-control" value="<?= date('Y-m-d') ?>"
                                required>

                        </div>
                        <div class="form-group">
                            <label for="bukti">Foto Bukti Transfer</label>
                            <input type="file" name="bukti" id="bukti" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                        </div>
                        <div class="form-group">
                            <h5 class="text-center">Pemberkasan</h5>
                            <div class="form-group">
                                <label class ="dropbtn">Type Rumah</label>
                                <select class="form-control" name="type">
                                    <option value="Tipe 1" {{ old('type') == 'Tipe 1' ? 'selected' : '' }}>Tipe 1</option>
                                    <option value="Tipe 2" {{ old('type') == 'Tipe 2' ? 'selected' : '' }}>Tipe 2</option>
                                    <option value="Tipe 3" {{ old('type') == 'Tipe 2' ? 'selected' : '' }}>Tipe </option>
                                    <option value="Tipe 4" {{ old('type') == 'Tipe 2' ? 'selected' : '' }}>Tipe 2</option>
                                </select>

                            </div>
                            <label for="ktp">Foto KTP</label>
                            <input type="file" name="ktp" id="ktp" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto KK</label>
                            <input type="file" name="kk" id="kk" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto Surat Nikah</label>
                            <input type="file" name="suratnikah" id="suratnikah" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto NPWP</label>
                            <input type="file" name="npwp" id="npwp" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto BPJS/KIS</label>
                            <input type="file" name="bpjs" id="bpjs" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto SK Kerja</label>
                            <input type="file" name="sk" id="sk" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto Slip Gaji</label>
                            <input type="file" name="gaji" id="gaji" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                            <label for="ktp">Foto Rekening Koran</label>
                            <input type="file" name="rekening" id="rekening" class="form-control"
                                accept="image/jpeg, image/png, image/jpg, image/gif" required>
                        </div>

                        <button class="col-12 btn btn-danger float-right" name="kirim">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
