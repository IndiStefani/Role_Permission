@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="title">
        Edit User
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('user_management.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        @if ($user->avatar)
                        <div class="mt-2">
                            <img src="{{ asset('assets/images/avatar/' . $user->avatar) }}" alt="Avatar" class="img-thumbnail" style="max-width: 100px;">
                        </div>
                        @else   
                        <div class="mt-2">
                            <img src="{{ asset('assets/images/avatar/default.png') }}" alt="Default Avatar" class="img-thumbnail" style="max-width: 100px;">
                        </div>
                        @endif

                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">

                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" placeholder="Input Here" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                <input type="text" placeholder="Input Here" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
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
                                        {{ __('Update') }}
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