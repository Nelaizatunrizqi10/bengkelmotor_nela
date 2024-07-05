@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="page-title">
                <h3>Data Akun</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Akun</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/akun/create" class="btn btn-added"><i data-feather="plus"></i><span>Akun</span></a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Akun</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($akun as $index => $akun)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$akun->kd_akun}}</td>
                                            <td>{{$akun->nama}}</td>
                                            <td>
                                                <a href="{{ route('akun.edit', $akun->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary">
                                                    <i class="fa fa-edit">Edit</i>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('akun.destroy', $akun->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Akun Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('akun.show', $akun->id) }}" title="Detail Akun">
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
