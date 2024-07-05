@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Data Kategori</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Data Kategori</a></li>
                        <li class="breadcrumb-item active">Create Data Kategori</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data Kategori</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategoriService->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategoriService->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori">
                                @error('nama_kategori')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Kategori">{{ old('deskripsi', $kategoriService->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="number" name="biaya" value="{{ old('biaya', $kategoriService->biaya) }}" class="form-control @error('biaya') is-invalid @enderror" placeholder="Masukkan Biaya">
                                @error('biaya')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-end">
                                <a href="{{ route('kategori.index') }}">
                                    <button type="button" class="btn btn-danger"> <i class="fa fa-undo"></i> Back</button>
                                </a>
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
