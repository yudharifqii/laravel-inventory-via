@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Barang</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('barangAdd')}}" class="btn icon icon-left btn-success mb-3"><i data-feather="edit-2"></i> Tambah Data Barang</a>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->nama}}</td>
                                        <td class="text-bold-500"><span class="badge bg-success">{{$data->kategori->nama_kategori ?? 'Data Sudah Dihapus'}}</span></td>
                                        <td class="text-bold-500">{{$data->jumlah}}</td>
                                        <td class="text-bold-500">
                                            <form action="{{Route('barangDelete', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{Route('barangEdit', $data->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{Route('barangDetail', $data->id)}}" class="btn icon btn-warning"><i class="bi bi-info-circle"></i></a>
                                                <button type="submit" class="btn icon btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection