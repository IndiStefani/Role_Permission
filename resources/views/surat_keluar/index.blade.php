@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="card-body d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Surat Keluar</h5>
            @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('surat_keluar.create') }}" class="btn btn-primary">Tambah Data</a>
            @endif
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
                                        <th>Kepada</th>
                                        <th>Disposisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Skeluar as $key => $Skeluar)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $Skeluar->created_at }}</td>
                                            <td>
                                                <a href="{{ route('surat_keluar.view', ['id' => $Skeluar->id]) }}">
                                                    {{ $Skeluar->no_surat }}
                                                </a>
                                            </td>
                                            <td>{{ $Skeluar->sifat }}</td>
                                            <td>{{ $Skeluar->pengirim->nm_jabatan }}</td>
                                            <td>
                                                {{ $Skeluar->tujuan }}
                                            </td>
                                            <td>{{ optional($Skeluar->disposisi)->dari }}</td>
                                            <td>
                                                <a href="{{ route('surat_keluar.view', ['id' => $Skeluar->id]) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('surat_keluar.edit', $Skeluar->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <form action="{{ route('surat_keluar.destroy', $Skeluar->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this surat masuk?')">
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
