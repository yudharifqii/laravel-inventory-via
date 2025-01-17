@extends('layouts/main')

@section('content')
<div class="page-heading">
    <h3>Form Ubah User</h3>
</div>
<div class="page-content">
    <section id="basic-vertical-layouts">
        <form action="{{Route('userUpdate', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="name">name</label>
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{$user->name}}">
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="{{$user->email}}">
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <fieldset class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-select" id="role" name="role">
                                                <option value="">--Pilih--</option>
                                                <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                                <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                                            </select>
                                            @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Password</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" autocomplete="off">
                                            @error('konfirmasi_password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex mt-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="{{Route('userPage')}}"
                                                class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection