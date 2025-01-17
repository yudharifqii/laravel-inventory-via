@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Detail Data Barang</h3>
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
                                        <th>Nama Barang</th>
                                        <td class="text-bold-500">: {{$detail->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td class="text-bold-500">: {{$detail->jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan</th>
                                        <td class="text-bold-500">: {{$detail->satuan->satuan ?? 'Data Sudah Dihapus'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td class="text-bold-500">: {{$detail->kategori->nama_kategori ?? 'Data Sudah Dihapus'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td class="text-bold-500">: {{$detail->keterangan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto Barang</th>
                                        <td class="text-bold-500">: <img src="{{asset('images/'.$detail->foto_barang)}}" width="200"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{Route('barangPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection