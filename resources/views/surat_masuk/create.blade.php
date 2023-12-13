@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="title">
        Tambah Surat Masuk
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('surat_masuk.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row  d-flex justify-content-center align-items-center">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="no_surat" class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control" id="no_surat" name="no_surat">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                                <div class="input-group input-append date" data-date-format="yyyy/mm/dd">
                                    <input class="form-control" type="text" placeholder="yyyy/mm/dd" autocomplete="off" name="tgl_surat">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="sifat" class="form-label">Sifat Surat</label>
                                <select class="form-select form-select" aria-label="Sifat Surat" id="sifat" name="sifat">
                                    <option selected>. . .</option>
                                    <option value="Segera">Segera</option>
                                    <option value="Penting">Penting</option>
                                    <option value="Rahasia">Rahasia</option>
                                    <option value="Biasa">Biasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="pengirim" class="form-label">Pengirim</label>
                                <input type="text" class="form-control" id="pengirim" name="pengirim">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="perihal" class="form-label">Perihal</label>
                                <input type="text" class="form-control" id="perihal" name="perihal">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="isi_surat" class="form-label">Isi Surat Ringkas</label>
                                <textarea class="form-control" id="isi_surat" name="isi_surat" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="row mb-0 mt-5">
                                <div class="col">
                                    <a href="{{ route('surat_masuk.index') }}" class="btn btn-danger">Kembali</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function logFormData(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the form data using FormData
        const formData = new FormData(event.target);

        // Convert FormData to a plain object
        const formDataObject = {};
        formData.forEach((value, key) => {
            formDataObject[key] = value;
        });

        // Log the form data to the console
        console.log(formDataObject);

        // If you want to submit the form after logging the data, you can do it here
        // event.target.submit();
    }
</script>

@endsection