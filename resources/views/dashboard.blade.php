@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/Chart.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <div class="content-wrapper">
            <div class="row same-height">

                @can('read role')
                    <div class="col">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <p class="card-title">User</p>
                                <h2 class="card-text"><strong>{{ $userCount }}</strong></h2>
                            </div>
                        </div>
                    </div>
                @endcan
                
                <div class="col">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <p class="card-title">Riwayat Disposisi</p>
                            <h2 class="card-text"><strong>{{ $disposisiCount }}</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <p class="card-title">Surat Masuk</p>
                            <h2 class="card-text"><strong>{{ $suratMasukCount }}</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <p class="card-title">Surat Keluar</p>
                            <h2 class="card-text"><strong>{{ $suratKeluarCount }}</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('assets/js/pages/index.min.js') }}"></script>
@endpush
