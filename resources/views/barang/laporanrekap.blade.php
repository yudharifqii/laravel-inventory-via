@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Laporan Rekapitulasi</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('cetakRekapitulasi')}}" target="_blank" class="btn icon icon-left btn-success mb-3"><i data-feather="printer"></i> Cetak</a>
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
                                            <th>Nama Kategori</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rekap as $data)
                                        <tr>
                                            <td class="text-bold-500">{{$loop->iteration}}</td>
                                            <td class="text-bold-500">{{$data->nama_kategori}}</td>
                                            <td class="text-bold-500" style="text-align: center;">{{$data->total_jumlah_barang}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" style="text-align: center; font-weight: bold;">Total Item</td>
                                            <td style="font-weight: bold; text-align: center;">{{$totalitem}}</td>
                                        </tr>
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