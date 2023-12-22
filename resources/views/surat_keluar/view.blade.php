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
                                                <a href="{{ asset('assets/file/' . $Skeluar->file) }}" target="" title="view" class="btn btn-lg btn-white">
                                                    <img src="{{ asset('assets/images/file.png') }}" alt="file" style="width: 50px;">
                                                </a>
                                            </div>
                                            <div class="m-b-10">
                                                <a href="{{ asset('assets/file/' . $Skeluar->file) }}"
                                                    class="btn btn-default btn-block btn-sm">{{ $Skeluar->no_surat }}</a>
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
                                                        <td>{{ optional($Skeluar->disposisi)->tujuan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Ket. Disposisi</td>
                                                        <td>{{ optional($Skeluar->disposisi)->isi_disposisi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Tgl. Disposisi</td>
                                                        <td>{{ optional($Skeluar->disposisi)->tgl_disposisi }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
@endsection
