@extends('home.templates.index')

@section('page-content')
    @if (Session::has('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Notification',
                    text: '{{ Session::get('alert') }}',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Riwayat Pembelian <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Riwayat Pembelian</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-danger text-white">
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="25%">Daftar</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Opsi</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($databeli as $db)
                                        <tr>
                                            <td>{{ $nomor }}</td>
                                            <td>
                                                <ul class="list-unstyled">
                                                    @foreach ($dataproperti[$db->idpembelianreal] as $key => $dp)
                                                        <li>{{ $dp->namaproperti }}{{ $key < count($dataproperti[$db->idpembelianreal]) - 1 ? ',' : '' }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{!! tanggal($db->tanggalbeli) . '<br>' . date('H:i', strtotime($db->waktu)) !!}</td>
                                            <td>Rp {{ number_format($db->totalbeli) }}</td>
                                            <td>
                                                @if ($db->statusbeli == 'Belum Bayar')
                                                    <?php
                                                    $deadline = date('Y-m-d H:i', strtotime($db->waktu . ' +1 day'));
                                                    $harideadline = date('Y-m-d', strtotime($db->waktu . ' +1 day'));
                                                    $jamdeadline = date('H:i', strtotime($db->waktu . ' +1 day'));
                                                    ?>
                                                    @if (date('Y-m-d H:i') >= $deadline)
                                                        Waktu pembayaran<br>telah habis
                                                    @else
                                                        <a href="{{ url('home/pembayaran/' . $db->idpembelianreal) }}"
                                                            class="btn btn-danger">Upload Bukti Pembayaran Sebelum
                                                            {{ tanggal($harideadline) . ' - Jam ' . $jamdeadline }}</a>
                                                    @endif
                                                @elseif ($db->statusbeli == 'Sudah Upload Bukti Pembayaran')
                                                    <a class="btn btn-danger text-white">Menunggu Konfirmasi Admin</a>
                                                @elseif ($db->statusbeli == 'Di Terima, Silahkan ke Kantor kami')
                                                    <a class="btn btn-danger text-white">Di Terima, Silahkan ke Kantor
                                                        kami</a>
                                                @elseif ($db->statusbeli == 'Selesai')
                                                    <span class="btn btn-success">Selesai</span>
                                                @elseif ($db->statusbeli == 'Pesanan Di Tolak')
                                                    <a class="btn btn-danger text-white">Pesanan Anda Di Tolak</a>
                                                @endif
                                            </td>
                                            <td><img width="100px" src="{{ asset('foto/' . $db->bukti) }}" alt="">
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
        </div>
    </section>
@endsection
