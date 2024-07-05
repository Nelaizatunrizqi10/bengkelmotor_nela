@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Edit Data Barang</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active">Edit Data Barang</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Data Barang</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_brg" value="{{ old('nama_brg', $barang->nama_brg) }}" class="form-control @error('nama_brg') is-invalid @enderror" placeholder="Masukkan Nama Barang">
                                @error('nama_brg')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                                @if($barang->image)
                                <img src="{{ Storage::url('public/barang/' . $barang->image) }}" alt="{{ $barang->nama_brg }}" class="img-thumbnail mt-2" width="200">
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ old('deskripsi', $barang->deskripsi) }}" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi">
                                @error('deskripsi')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" value="{{ old('stok', $barang->stok) }}" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok">
                                @error('stok')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" value="{{ old('harga', $barang->harga) }}" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
                                @error('harga')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-end">
                                <a href="{{ route('barang.index') }}">
                                    <button type="button" class="btn btn-danger"> <i class="fa fa-undo"></i> Kembali</button>
                                </a>
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
