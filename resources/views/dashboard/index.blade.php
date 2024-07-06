@extends('layouts.layout')

@section('content')
<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Dashboard</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="dash-count bg-primary text-white">
                    <div class="dash-imgs">
                        <i data-feather="settings"></i>
                    </div>
                    <div class="dash-counts">
                        <h4>{{ $barangCount }}</h4>
                        <h5>Total Barang</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dash-count bg-success text-white">
                    <div class="dash-imgs">
                        <i data-feather="layers"></i>
                    </div>
                    <div class="dash-counts">
                        <h4>{{ $kategoriServiceCount }}</h4>
                        <h5>Total Kategori Service</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dash-count bg-warning text-white">
                    <div class="dash-imgs">
                        <i data-feather="dollar-sign"></i>
                    </div>
                    <div class="dash-counts">
                        <h4>Rp {{ number_format($totalPembayaran, 2, ',', '.') }}</h4>
                        <h5>Total Pembayaran Servis</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"> Barang Yang Tersedia</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Image</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $index => $brg)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $brg->nama_brg }}</td>
                                        <td>
                                            <img src="{{ asset('storage/barang/' . $brg->image) }}" alt="{{ $brg->nama_brg }}" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td>Rp {{ number_format($brg->harga, 2, ',', '.') }}</td>
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
