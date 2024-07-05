@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Data Barang</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active">Create Data Barang</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data Barang</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_brg" value="{{ old('nama_brg') }}" class="form-control @error('nama_brg') is-invalid @enderror" placeholder="Masukkan Nama Barang">
                                @error('nama_brg')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <div class="image-upload">
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="Masukkan Gambar Barang" onchange="previewImage(event)">
                                    <div class="image-uploads">
                                        <img id="image-preview" src="{{ asset('Template/img/icons/upload.svg') }}" alt="img">
                                        <h4>Seret dan lepaskan file untuk mengunggah</h4>
                                    </div>
                                </div>
                                @error('image')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-top: 20px;">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Barang">
                                @error('deskripsi')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok Barang">
                                @error('stok')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga Barang">
                                @error('harga')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('barang.index') }}">
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

<style>
    .image-upload {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-uploads {
        border: 2px dashed #d3d3d3;
        padding: 20px;
        text-align: center;
    }

    #image-preview {
        max-width: 100%;
        max-height: 50px; /* Set a max-height to match the input field size */
        margin-top: 10px;
    }

    .form-control {
        width: 100%;
    }
</style>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image-preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
