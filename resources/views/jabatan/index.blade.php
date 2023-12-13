@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="card-body d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title">Jabatan</h5>
        <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table-id" class="table dt-responsive display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Jabatan</th>
                                    <th>Nama Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatan as $key => $jabatan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $jabatan->kd_jabatan }}</td>
                                    <td>{{ $jabatan->nm_jabatan }}</td>
                                    <td>
                                        <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
</div>

@endsection