@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="title">
        Tabs
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill" data-bs-target="#pills-home2" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="ti-file"></i>
                                    Surat Masuk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" data-bs-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="ti-control-shuffle"></i>
                                    Disposisi</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-md-4 profile-left" align="center">
                                        <div class="panel-body">
                                            <a href="../../assets/file/MAS-20200514-222259-19.pdf" target="" title="view" class="btn btn-lg btn-white">
                                                <i class="fa fa-file fa-4x pull-center text-primary"></i>
                                            </a>
                                        </div>
                                        <div class="m-b-10">
                                            <a href="" class="btn btn-default btn-block btn-sm">{{$Smasuk->no_surat}}</a>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align: right; width: 30%; margin-right :10px"># Detail Surat Masuk</th>
                                                    <th scope="col">{{$Smasuk->no_surat}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right;">Tanggal dan Jam</td>
                                                    <td>{{$Smasuk->tgl_surat}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">Pengirim</td>
                                                    <td>{{$Smasuk->pengirim}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">Sifat Surat</td>
                                                    <td>{{$Smasuk->sifat}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">Perihal</td>
                                                    <td>{{$Smasuk->perihal}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">Isi Surat Ringkas</td>
                                                    <td>{{$Smasuk->isi_surat}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;">Disposisi Awal</td>
                                                    <td>{{$Smasuk->disposisi}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Voluptatum, mollitia!</div>
                            <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">Lorem ipsum dolor sit amet.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection