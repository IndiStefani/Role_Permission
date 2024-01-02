@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="title">
            Tambah User
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('user_management.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        id="avatar" name="avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">{{ __('Role') }}</label>
                                    <select class="form-control @error('role') is-invalid @enderror" id="role"
                                        name="role" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 mr-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" placeholder="Input Here"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input type="text" placeholder="Input Here"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" placeholder="Input Here"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" placeholder="Input Here"
                                        class="form-control @error('password') is-invalid @enderror" id="password-confirm"
                                        name="password_confirmation" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_jabatan" class="form-label">{{ __('jabatan') }}</label>
                                    <select class="form-control @error('id_jabatan') is-invalid @enderror" id="id_jabatan"
                                        name="id_jabatan" required>
                                        @foreach ($jabatan as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nm_jabatan }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_jabatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <div class="row mb-0 mt-5">
                                    <div class="col">
                                        <a href="{{ route('user_management.index') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
