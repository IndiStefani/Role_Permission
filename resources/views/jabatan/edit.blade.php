@extends('layouts.master')
@section('content')

@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="title">
        Edit Jabatan
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('jabatan.update', ['jabatan' => $jabatan->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nm_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nm_jabatan') is-invalid @enderror" id="nm_jabatan" name="nm_jabatan" value="{{ $jabatan->nm_jabatan }}" required>
                        @error('nm_jabatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center align-items-center">
                        <div class="row mb-0 mt-5">
                            <div class="col">
                                <a href="{{ route('jabatan.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@endsection