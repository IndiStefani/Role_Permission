@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="title">
            Surat Masuk
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
                                        Surat Masuk
                                    </button>
                                </li>
                                <li class="nav-item" role="disposisi">
                                    <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                        data-bs-target="#disposisi" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        <i class="ti-control-shuffle"></i>
                                        Disposisi
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="surat_masuk" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-4 profile-left" align="center">
                                            <div class="panel-body">
                                                <a href="{{ asset('assets/file/' . $Smasuk->file) }}" target="" title="view" class="btn btn-lg btn-white">
                                                    <img src="{{ asset('assets/images/file.png') }}" alt="file" style="width: 50px;">
                                                </a>
                                            </div>
                                            <div class="m-b-10">
                                                <a href="{{ asset('assets/file/' . $Smasuk->file) }}"
                                                    class="btn btn-default btn-block btn-sm">{{ $Smasuk->no_surat }}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: right; width: 30%;"># Detail
                                                            Surat Masuk</th>
                                                        <th scope="col">{{ $Smasuk->no_surat }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: right;">Tanggal Surat</td>
                                                        <td>{{ $Smasuk->tgl_surat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Pengirim</td>
                                                        <td>{{ $Smasuk->pengirim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Sifat Surat</td>
                                                        <td>
                                                            <i class="fas fa-tag fa-sm text-success"></i>
                                                            <span class="m-2">{{ $Smasuk->sifat }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Perihal</td>
                                                        <td>{{ $Smasuk->perihal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Isi Surat Ringkas</td>
                                                        <td>{{ $Smasuk->isi_surat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;">Disposisi Awal</td>
                                                        <td>{{ optional($Smasuk->disposisi)->tujuan }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="disposisi" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="container mb-5 mt-3">
                                        <div class="row d-flex align-items-baseline">
                                            <div class="col-xl-9">
                                                <p style="color: #7e8d9f;font-size: 20px;">No. Surat :
                                                    <strong>{{ $Smasuk->no_surat }}</strong>
                                                </p>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="container">
                                            <div class="row p-4" style="background-color:#e4e7e8 ;">
                                                <div class=" col-xl-3">
                                                    <ul class="list-unstyled">
                                                        <li class="text-muted  mb-3">Tanggal Surat : <span
                                                                class="fw-bold">{{ $Smasuk->tgl_surat }}</span></li>
                                                        <li class="text-muted">Sifat Surat : <span
                                                                class="fw-bold">{{ $Smasuk->sifat }}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-xl-5">
                                                    <ul class="list-unstyled">
                                                        <li class="text-muted  mb-3"><span>Asal Surat : </span><span
                                                                class="fw-bold">{{ $Smasuk->pengirim }}</span></li>
                                                        <li class="text-muted"><span>Perihal : </span><span
                                                                class="fw-bold">{{ $Smasuk->perihal }}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-xl-4">
                                                    <ul class="list-unstyled">
                                                        <li class="text-muted mb-3"><span>Disposisi Saat Ini : </span><span
                                                                class="fw-bold">{{ optional($Smasuk->disposisi)->tujuan }}</span>
                                                        </li>
                                                        <li class="text-muted"><span>Isi Surat Penting : </span><span
                                                                class="fw-bold">{{ $Smasuk->isi_surat }}</span></li>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-3 mx-0 justify-content-center">
                                            <h4 class="m-4"><strong>Riwayat Disposisi</strong></h4>
                                            <table class="table table-striped table-borderless">
                                                <thead style="background-color:#ffffff ;">
                                                    <tr>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Dari</th>
                                                        <th scope="col">Informasi</th>
                                                        <th scope="col">Diteruskan Ke</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($disposisi)
                                                        <tr>
                                                            <td>{{ optional($disposisi->created_at)->format('Y-m-d') }}
                                                            </td>
                                                            <td>{{ optional($Smasuk->disposisi)->dari }}</td>
                                                            <td>{{ optional($disposisi)->isi_disposisi }}</td>
                                                            <td>{{ optional($disposisi)->tujuan }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="4" class="text-center font-italic">Tidak ada
                                                                data disposisi</td>
                                                        </tr>
                                                    @endif
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
