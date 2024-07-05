@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Edit Data Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Data Profile</a></li>
                        <li class="breadcrumb-item active">Edit Data Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Data Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama User</label>
                                <select class="form-control form-select @error('id_user') is-invalid @enderror" name="id_user" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="selected">Pilih User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $profile->id_user ? 'selected' : '' }}> {{ $user->name }} </option>
                                    @endforeach
                                </select>
                                @error('id_user')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Plat</label>
                                <input type="text" name="no_plat" value="{{ old('no_plat', $profile->no_plat) }}" class="form-control @error('no_plat') is-invalid @enderror" placeholder="Masukkan no_plat Barang">
                                @error('no_plat')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Merek</label>
                                <input type="text" name="merek" value="{{ old('merek', $profile->merek) }}" class="form-control @error('merek') is-invalid @enderror" placeholder="Masukkan merek Barang">
                                @error('merek')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Foto Profil </label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                                @if($profile->image)
                                <img src="{{ Storage::url('public/profile/' . $profile->image) }}" alt="{{ $profile->nama_brg }}" class="img-thumbnail mt-2" width="200">
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" value="{{ old('alamat', $profile->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat">
                                @error('alamat')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="number" name="hp" value="{{ old('hp', $profile->hp) }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan nomor HP">
                                @error('hp')
                                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-end">
                                <a href="{{ route('profile.index') }}">
                                    <button type="button" class="btn btn-danger"> <i class="fa fa-undo"></i> Back</button>
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
