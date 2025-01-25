@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Laporan Barang</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('cetakBarang')}}" target="_blank" class="btn icon icon-left btn-success mb-3"><i data-feather="printer"></i> Cetak</a>
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
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Foto Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barang as $data)
                                        <tr>
                                            <td class="text-bold-500">{{$loop->iteration}}</td>
                                            <td class="text-bold-500">{{$data->nama}}</td>
                                            <td class="text-bold-500"><span class="badge bg-success">{{$data->kategori->nama_kategori ?? 'Data Sudah Dihapus'}}</span></td>
                                            <td class="text-bold-500">{{$data->jumlah}}</td>
                                            <td class="text-bold-500">{{$data->keterangan}}</td>
                                            <td class="text-bold-500"><img src="{{asset('images/'.$data->foto_barang)}}" width="75"></td>
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