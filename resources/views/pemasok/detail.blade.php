@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Detail Data Pemasok</h3>
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
                                        <th>Nama</th>
                                        <td class="text-bold-500">: {{$pemasok->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td class="text-bold-500">: {{$pemasok->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td class="text-bold-500">: {{$pemasok->telepon}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td class="text-bold-500">: {{$pemasok->alamat}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{Route('pemasokPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection