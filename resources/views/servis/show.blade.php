@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Detail Data Servis</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('servis.index') }}">Data Servis</a></li>
                        <li class="breadcrumb-item active">Detail Data Servis</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Data Servis</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Nama Kategori Servis</label>
                                <input type="text" class="form-control" value="{{ $servis->kategoriService->nama_kategori }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Profil</label>
                                <input type="text" class="form-control" value="{{ $servis->profile->user->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Barang</label>
                                <input type="text" class="form-control" value="{{ $servis->barang->nama_brg }}" readonly>
                            </div>

                            <div class="form-group" style="margin-top: 20px;">
                                <label>Jumlah Pembayaran</label>
                                <input type="text" class="form-control" value="{{ $servis->jumlah_bayar }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="text" class="form-control" value="{{ $servis->tanggal_selesai }}" readonly>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('servis.index') }}">
                                    <button type="button" class="btn btn-danger"><i class="fa fa-undo"></i> Back</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
