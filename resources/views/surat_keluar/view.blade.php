@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="title">
            Surat Keluar
            <button class="btn btn-secondary float-end" onclick="history.back()">
                <i class="ti-control-skip-backward"></i>
                Kembali
            </button>
        </div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="surat_masuk">
                                    <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                        data-bs-target="#surat_masuk" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        <i class="ti-file"></i>
                                        Surat Keluar
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="surat_masuk" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-4 profile-left" align="center">
                                            <div class="panel-body">
                                                <a href="{{ asset('assets/file/' . $Skeluar->file) }}" target=""
                                                    title="view" class="btn btn-lg btn-white">
                                                    <img src="{{ asset('assets/images/file.png') }}" alt="file"
                                                        style="width: 50px;">
                                                </a>
                                            </div>
                                            <div class="m-b-10">
                                                <a href="{{ asset('assets/file/' . $Skeluar->file) }}"
                                                    class="btn btn-default btn-block btn-sm">{{ $Skeluar->no_surat }}</a>
                                            </div>
                                            <div>
                                                @if (!optional($Skeluar->disposisi)->dari)
                                                    <a href="#" class="btn btn-warning btn-lg btn-location-arrow"
                                                        data-bs-toggle="modal" data-bs-target="#Skeluar"
                                                        data-id-surat-keluar="{{ $Skeluar->id }}">
                                                        <i class="fas fa-location-arrow"></i>
                                                        Disposisi
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm" disabled>
                                                        <i class="fas fa-check"></i>
                                                        Closed
                                                    </button>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: right; width: 30%;"># Detail
                                                            Surat Masuk</th>
                                                        <th scope="col">{{ $Skeluar->no_surat }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: right;">Tanggal Surat</td>
                                                        <td>{{ $Skeluar->tgl_surat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Pengirim</td>
                                                        <td>{{ $Skeluar->pengirim->nm_jabatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Sifat Surat</td>
                                                        <td>
                                                            <i class="fas fa-tag fa-sm text-success"></i>
                                                            <span class="m-2">{{ $Skeluar->sifat }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Perihal</td>
                                                        <td>{{ $Skeluar->perihal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Tertuju Pada</td>
                                                        <td>{{ $Skeluar->perihal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Alamat</td>
                                                        <td>{{ $Skeluar->perihal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Isi Surat Ringkas</td>
                                                        <td>{{ $Skeluar->isi_surat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Disposisi</td>
                                                        <td>{{ optional($Skeluar->disposisi)->dari }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Ket. Disposisi</td>
                                                        <td>{{ optional($Skeluar->disposisi)->isi_disposisi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Tgl. Disposisi</td>
                                                        <td>{{ optional($Skeluar->disposisi)->created_at }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="Skeluar" tabindex="-1" aria-labelledby="largeModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="largeModalLabel">
                                                <span class="badge bg-dark"> # Disposisi</span> &nbsp; Disposisi Awal Surat
                                                Masuk No : <u>DPU/2020/IV/762-1</u>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('disposisi_keluar.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_surat_keluar" value="">
                                                <div class="row d-flex justify-content-center align-items-center gy-3">
                                                    <label class="col-md-3"><strong>Dikirim Melalui</strong></label>
                                                    <div class="col-md-9">
                                                        <select name="dari"
                                                            class="default-select2 form-control select2-hidden-accessible"
                                                            style="width:100%" required tabindex="-1"
                                                            aria-hidden="true">
                                                            <option selected>. . .</option>
                                                            <option value="Email">Email</option>
                                                            <option value="Faksmile">Faksmile</option>
                                                            <option value="Kurir">Kurir</option>
                                                            <option value="Handcarry">Handcarry</option>
                                                            <option value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-md-3 control-label">Keterangan</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text" name="isi_disposisi" maxlength="128" class="form-control"
                                                            placeholder="Email/No. Fax/No. Resi" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                var idSuratKeluar = $(this).data('id-surat-keluar');

                // Isi nilai ID surat masuk pada formulir disposisi
                $('#Skeluar form input[name="id_surat_keluar"]').val(idSuratKeluar);
            });
        });
    </script>
@endsection
