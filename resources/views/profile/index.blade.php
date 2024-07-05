@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Data Profil</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Profil</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Profil</h3>
                        <a href="/profile/create">
                            <button type="button" class="btn btn-rounded btn-outline-info">Tambah</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Plat</th>
                                        <th>Merek</th>
                                        <th>Foto Profil</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profiles as $index => $profile)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$profile->user->name}}</td>
                                            <td>{{$profile->no_plat}}</td>
                                            <td>{{$profile->merek}}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/profile/'.$profile->image) }}" class="rounded" style="width: 100px">
                                            </td>
                                            <td>{{$profile->alamat}}</td>
                                            <td>{{$profile->hp}}</td>
                                            <td>
                                                <a href="{{ route('profile.edit', $profile->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary">
                                                    <i class="fa fa-edit">Edit</i>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('profile.show', $profile->id) }}" title="Detail profile">
                                                    <span class="badge bg-success"><i class="fa fa-tags"></i> Detail</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
