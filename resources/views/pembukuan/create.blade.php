@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Jurnal</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Data Jurnal</a></li>
                        <li class="breadcrumb-item active">Create Jurnal</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('laporan.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Pilih Id Servis</label>
                                <select class="form-control form-select @error('id_servis') is-invalid @enderror" name="id_servis" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih Id Servis</option>
                                    @foreach ($servis as $servis)
                                    <option value="{{ $servis->id }}"> {{ $servis->Profile->User->name }} </option>
                                    @endforeach
                                </select>
                                @error('id_servis')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pilih Nomor Rekening</label>
                                <select class="form-control form-select @error('id_akuns') is-invalid @enderror" name="id_akuns" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih Id Akun</option>
                                    @foreach ($akun as $akun)
                                    <option value="{{ $akun->id }}"> {{ $akun->nama }} </option>
                                    @endforeach
                                </select>
                                @error('id_akuns')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Saldo</label>
                                <input type="text" name="saldo" value="{{ old('saldo') }}" class="form-control @error('saldo') is-invalid @enderror" placeholder="Masukkan saldo Barang">
                                @error('saldo')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('laporan.index') }}">
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
