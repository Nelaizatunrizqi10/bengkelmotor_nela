@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Detail Data Kategori</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active">Detail Data Kategori</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Data Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <p>{{ $kategoriService->id }}</p>
                        </div>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <p>{{ $kategoriService->nama_kategori }}</p>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <p>{{ $kategoriService->deskripsi }}</p>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <p>{{ $kategoriService->biaya }}</p>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('kategori.index') }}" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
