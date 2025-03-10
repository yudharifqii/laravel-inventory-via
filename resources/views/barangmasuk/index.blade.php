@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Barang Masuk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            @if(Auth::user()->role == 'User')
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('barang-masukAdd')}}" class="btn icon icon-left btn-success mb-3"><i data-feather="edit-2"></i> Tambah Data Barang Masuk</a>
                </div>
            </div>
            @endif
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
                                        <th>Tanggal Barang Masuk</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        @if(Auth::user()->role == 'User')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangmasuk as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->barang->nama ?? 'Data Sudah Dihapus'}}</td>
                                        <td class="text-bold-500">{{ date('d M Y', strtotime($data->tanggal_barang_masuk)) }}</td>
                                        <td class="text-bold-500">{{$data->jumlah}}</td>
                                        <td class="text-bold-500">{{$data->satuan->satuan ?? 'Data Sudah Dihapus'}}</td>
                                        <td class="text-bold-500">
                                            @if(Auth::user()->role == 'User')
                                            <form action="{{Route('barang-masukDelete', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{Route('barang-masukEdit', $data->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <button type="submit" class="btn icon btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                            @endif
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