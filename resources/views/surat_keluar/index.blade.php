@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="card-body d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Surat Keluar</h5>
            @if(auth()->user()->hasRole('admin'))
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
                                        <th>Disposisi Saat Ini</th>
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
                                            <td>{{ $Skeluar->pengirim }}</td>
                                            <td>
                                                @if (!optional($Skeluar->disposisi)->tujuan)
                                                    <a href="#" class="btn btn-success btn-sm btn-location-arrow"
                                                        data-bs-toggle="modal" data-bs-target="#largeModal"
                                                        data-id-surat="{{ $Skeluar->id }}">
                                                        <i class="fas fa-location-arrow"></i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm" disabled>
                                                        <i class="fas fa-location-arrow"></i>
                                                    </button>
                                                @endif
                                                {{ optional($Skeluar->disposisi)->tujuan }}
                                            </td>

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
                            {{-- <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">
                                            <span class="badge bg-dark"> # Disposisi</span> &nbsp; Disposisi Awal Surat Masuk No : <u>DPU/2020/IV/762-1</u>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('disposisi.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_surat_keluar" value="" />
                                            <div class="row d-flex justify-content-center align-items-center gy-3">
                                                <label class="col-md-3"><strong>Perihal</strong></label>
                                                <div class="col-md-9">
                                                    <p>Kunjungan Kerja</p>
                                                </div>

                                                <label class="col-md-3"><strong>Dari Bagian</strong></label>
                                                <div class="col-md-9">
                                                    <p>{{ $Skeluar->disposisi->dari }}</p>
                                                </div>

                                                <label class="col-md-3 control-label">Disposisi Kepada</label>
                                                <div class="col-md-9">
                                                    <select name="tujuan" class="default-select2 form-control select2-hidden-accessible" style="width:100%" required tabindex="-1" aria-hidden="true">
                                                        <option selected>. . .</option>
                                                        @foreach ($jabatan as $jabatan)
                                                        <option value="{{ $jabatan->nm_jabatan }}">{{ $jabatan->nm_jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label class="col-md-3">Isi Disposisi</label>
                                                <div class="col-md-9">
                                                    <textarea type="text" name="isi_disposisi" maxlength="128" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Tangani klik tombol "Lokasi Arrow"
            $('.btn-location-arrow').on('click', function() {
                // Dapatkan ID surat masuk dari atribut data
                var idSuratMasuk = $(this).data('id-surat');

                // Isi nilai ID surat masuk pada formulir disposisi
                $('#largeModal form input[name="id_surat_keluar"]').val(idSuratMasuk);
            });
        });
    </script>
@endsection
