@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Detail Data Barang</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active">Detail Data Barang</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Data Barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <p>{{ $barang->id }}</p>
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <p>{{ $barang->nama_brg }}</p>
                        </div>

                        <div class="form-group">
                            <label>Gambar Produk</label>
                            @if($barang->image)
                            <img src="{{ Storage::url('public/barang/' . $barang->image) }}" alt="{{ $barang->nama_brg }}" class="img-thumbnail mt-2" width="500">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <p>{{ $barang->deskripsi }}</p>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <p>{{ $barang->stok }}</p>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <p>{{ $barang->harga }}</p>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('barang.index') }}">
                                <button type="button" class="btn btn-danger"> <i class="fa fa-undo"></i> Kembali</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
