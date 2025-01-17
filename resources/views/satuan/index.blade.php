@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Satuan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a href="{{Route('satuanAdd')}}" class="btn icon icon-left btn-success mb-3"><i data-feather="edit-2"></i> Tambah Data Satuan</a>
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
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($satuan as $data)
                                    <tr>
                                        <td class="text-bold-500">{{$data->satuan}}</td>
                                        <td class="text-bold-500">
                                            <form action="{{Route('satuanDelete', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{Route('satuanEdit', $data->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil-square"></i></a>
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