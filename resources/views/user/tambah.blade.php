@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Tambah User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{Route('userStore')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" autocomplete="off">
                                @error('konfirmasi_password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <fieldset class="form-group">
                                <label for="role">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="">--Pilih--</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="User">User</option>
                                </select>
                                @error('role')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <a href="{{Route('userPage')}}" class="btn btn-light-secondary mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection