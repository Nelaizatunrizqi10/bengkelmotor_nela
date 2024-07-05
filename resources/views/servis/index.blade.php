@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="page-title">
                <h3>Data Servis</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Servis</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/servis/create" class="btn btn-added"><i data-feather="plus"></i><span>Servis</span></a>
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
                                        <th>Kategori Service</th>
                                        <th>Profil</th>
                                        <th>Barang</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servis as $index => $servis)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$servis->KategoriService->nama_kategori}}</td>
                                            <td>{{$servis->profile->user->name}}</td>
                                            <td>{{$servis->barang->nama_brg}}</td>
                                            <td>{{$servis->jumlah_bayar}}</td>
                                            <td>{{$servis->tanggal_masuk}}</td>
                                            <td>{{$servis->tanggal_selesai}}</td>
                                            <td>
                                                <span class="badge bg-{{ $servis->status == 'pending' ? 'warning' : ($servis->status == 'completed' ? 'success' : 'danger') }} status-badge" data-id="{{ $servis->id }}" data-status="{{ $servis->status }}" data-bs-toggle="modal" data-bs-target="#statusModal" style="cursor: pointer;">
                                                    {{ ucfirst($servis->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('servis.edit', $servis->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary"><i class="fa fa-edit"></i> Edit</span>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('servis.destroy', $servis->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('servis.show', $servis->id) }}" title="Detail Servis">
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

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Ubah Status Servis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="statusForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="batal">Batal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusBadges = document.querySelectorAll('.status-badge');
        const statusForm = document.getElementById('statusForm');
        const statusSelect = document.getElementById('status');

        statusBadges.forEach(badge => {
            badge.addEventListener('click', function() {
                const currentStatus = this.getAttribute('data-status');
                const id = this.getAttribute('data-id');

                statusSelect.value = currentStatus;
                statusForm.setAttribute('action', `/servis/update-status/${id}`);
            });
        });
    });
</script>

@endsection
