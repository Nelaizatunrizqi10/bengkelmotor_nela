@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="page-title">
                <h3>Data Barang</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/barang/create" class="btn btn-added"><i data-feather="plus"></i><span>Barang</span></a>
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
                                        <th>Nama barang</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $index => $barang)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$barang->nama_brg}}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/barang/'.$barang->image) }}" class="rounded" style="width: 100px">
                                            </td>
                                            <td>{{$barang->deskripsi}}</td>
                                            <td>{{$barang->stok}}</td>
                                            <td>{{$barang->harga}}</td>
                                            <td>
                                                <a href="{{ route('barang.edit', $barang->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary">
                                                    <i class="fa fa-edit">Edit</i>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('barang.show', $barang->id) }}" title="Detail Barang">
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
