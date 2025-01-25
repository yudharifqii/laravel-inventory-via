@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Laporan Barang Masuk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('cetakBarangMasuk')}}" target="_blank" class="btn icon icon-left btn-success mb-3"><i data-feather="printer"></i> Cetak</a>
                </div>
            </div>
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Barang Masuk</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangmasuk as $data)
                                        <tr>
                                            <td class="text-bold-500">{{$loop->iteration}}</td>
                                            <td class="text-bold-500">{{$data->barang->nama ?? 'Data Sudah Dihapus'}}</td>
                                            <td class="text-bold-500">{{ date('d M Y', strtotime($data->tanggal_barang_masuk)) }}</td>
                                            <td class="text-bold-500">{{$data->jumlah}}</td>
                                            <td class="text-bold-500">{{$data->satuan->satuan ?? 'Data Sudah Dihapus'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection