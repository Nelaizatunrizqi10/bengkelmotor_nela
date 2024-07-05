@extends('Layouts.layout')

@section('content')

<div class="page-wrapper cardhead">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Data Akun</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('servis.index') }}">Data Akun</a></li>
                        <li class="breadcrumb-item active">Create Data Akun</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('akun.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="margin-top: 20px;">
                                <label>Kode Akun</label>
                                <input type="number" name="kd_akun" value="{{ old('kd_akun') }}" class="form-control @error('kd_akun') is-invalid @enderror" placeholder="Masukkan Kode Akun">
                                @error('kd_akun')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Akun</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Akun">
                                @error('nama')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('akun.index') }}">
                                    <button type="button" class="btn btn-danger"> <i class="fa fa-undo"></i> Back</button>
                                </a>
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
