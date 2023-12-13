@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="card-body d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title">Surat Masuk</h5>
        <a href="{{ route('surat_masuk.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                    <th>Tanggal & Jam Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Sifat Surat</th>
                                    <th>Pengirim</th>
                                    <th>Disposisi Saat Ini</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Smasuk as $key => $Smasuk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $Smasuk->created_at }}</td>
                                    <td>
                                        <a href="{{ route('surat_masuk.view', ['id' => $Smasuk->id]) }}">
                                            {{ $Smasuk->no_surat }}
                                        </a>
                                    </td>
                                    <td>{{ $Smasuk->sifat }}</td>
                                    <td>{{ $Smasuk->pengirim }}</td>
                                    <td>{{ $Smasuk->disposisi }}</td>
                                    <td>
                                        <a href="{{ route('surat_masuk.view', ['id' => $Smasuk->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('surat_masuk.edit', $Smasuk->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ route('surat_masuk.destroy', $Smasuk->id) }}" method="POST" style="display: inline-block;">
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