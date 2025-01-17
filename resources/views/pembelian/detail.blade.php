@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Detail Data Pembelian</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <tbody>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td class="text-bold-500">: {{ date('d M Y', strtotime($detail->tanggal)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td class="text-bold-500">: {{$detail->nama_barang}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td class="text-bold-500">: {{$detail->kategori->nama_kategori ?? 'Data Sudah Dihapus'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Pemasok</th>
                                        <td class="text-bold-500">: {{$detail->pemasok->nama ?? 'Data Sudah Dihapus'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Penanggung Jawab</th>
                                        <td class="text-bold-500">: {{$detail->penanggungjawab->nama ?? 'Data Sudah Dihapus'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td class="text-bold-500">: {{$detail->jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td class="text-bold-500">: {{$detail->status}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{Route('pembelianPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection