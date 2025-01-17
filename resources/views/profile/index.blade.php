@extends('layouts/main')
@section('content')
<div class="page-heading">
    <h3>Profile Akun</h3>
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
                                        <td class="text-bold-500">: {{Auth()->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td class="text-bold-500">: {{Auth()->user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td class="text-bold-500">: {{Auth()->user()->role}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Bergabung</th>
                                        <td class="text-bold-500">: {{Auth()->user()->created_at}}</td>
                                    </tr>
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