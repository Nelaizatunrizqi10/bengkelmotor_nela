@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="page-title">
                <h3>Data Kategori Servis</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Kategori servis</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/kategori/create" class="btn btn-added"><i data-feather="plus"></i><span>Kategori</span></a>
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
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriServices as $index => $kategoriService)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $kategoriService->nama_kategori }}</td>
                                            <td>{{ $kategoriService->deskripsi }}</td>
                                            <td>{{ $kategoriService->biaya }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $kategoriService->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary">
                                                        <i class="fa fa-edit">Edit</i>
                                                    </span>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('kategori.destroy', $kategoriService->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('kategori.show', $kategoriService->id) }}" title="Detail Barang">
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
