@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Data Servis</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('servis.index') }}">Data Servis</a></li>
                        <li class="breadcrumb-item active">Buat Data Servis</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('servis.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Nama Kategori Service</label>
                                <select class="form-control form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih Kategori Servis</option>
                                    @foreach ($kategoriService as $kategori)
                                    <option value="{{ $kategori->id }}"> {{ $kategori->nama_kategori }} </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Profil</label>
                                <select class="form-control form-select @error('id_profil') is-invalid @enderror" name="id_profil" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih Profile</option>
                                    @foreach ($profile as $profile)
                                    <option value="{{ $profile->id }}"> {{ $profile->user->name }} </option>
                                    @endforeach
                                </select>
                                @error('id_profil')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Barang</label>
                                <select class="form-control form-select @error('id_barang') is-invalid @enderror" name="id_barang" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih Barang</option>
                                    @foreach ($barang as $barang)
                                    <option value="{{ $barang->id }}"> {{ $barang->nama_brg }} </option>
                                    @endforeach
                                </select>
                                @error('id_barang')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <label>Jumlah Pembayaran</label>
                                <input type="number" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" class="form-control @error('jumlah_bayar') is-invalid @enderror" placeholder="Masukkan Jumlah Bayar">
                                @error('jumlah_bayar')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="datetime-local" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="form-control @error('tanggal_masuk') is-invalid @enderror" placeholder="Masukkan tanggal_masuk">
                                @error('tanggal_masuk')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="datetime-local" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="form-control @error('tanggal_selesai') is-invalid @enderror" placeholder="Masukkan tanggal_selesai">
                                @error('tanggal_selesai')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">    
                                <a href="{{ route('servis.index') }}">
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
