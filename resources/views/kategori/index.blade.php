@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Kategori</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            @if(Auth::user()->role == 'User')
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('kategoriAdd')}}" class="btn icon icon-left btn-success mb-3"><i data-feather="edit-2"></i> Tambah Data Kategori</a>
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
                                        <th>Nama Kategori</th>
                                        @if(Auth::user()->role == 'User')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->nama_kategori}}</td>
                                        <td class="text-bold-500">
                                            @if(Auth::user()->role == 'User')
                                            <form action="{{Route('kategoriDelete', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{Route('kategoriEdit', $data->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil-square"></i></a>
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