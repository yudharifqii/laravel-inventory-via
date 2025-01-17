@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Pembelian</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('pembelianAdd')}}" class="btn icon icon-left btn-success mb-3"><i data-feather="edit-2"></i> Tambah Data Pembelian</a>
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
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pembelian as $data)
                                    <tr>
                                        <td class="text-bold-500">{{ date('d M Y', strtotime($data->tanggal)) }}</td>
                                        <td class="text-bold-500">{{$data->nama_barang}}</td>
                                        <td class="text-bold-500">
                                            <span class="badge bg-success">{{$data->kategori->nama_kategori}}</span>
                                        </td>
                                        <td class="text-bold-500">{{$data->jumlah}}</td>
                                        <td class="text-bold-500">
                                            @if($data->status == 'Diajukan')
                                            <span class="badge bg-info">{{ $data->status }}</span>
                                            @elseif($data->status == 'Disetujui')
                                            <span class="badge bg-success">{{ $data->status }}</span>
                                            @else
                                            <span class="badge bg-danger">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-bold-500">
                                            <form action="{{Route('pembelianDelete', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{Route('pembelianEdit', $data->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{Route('pembelianDetail', $data->id)}}" class="btn icon btn-warning"><i class="bi bi-info-circle"></i></a>
                                                @if(Auth::user()->role == 'User' && $data->status == 'Disetujui')
                                                <a href="{{Route('pembelianCetak', $data->id)}}" target="_blank" class="btn icon btn-secondary"><i class="bi bi-download"></i></a>
                                                @endif
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