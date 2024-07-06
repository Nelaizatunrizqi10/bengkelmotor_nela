@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-title">
                <h3>Laporan Akuntansi</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/laporan/create" class="btn btn-added"><i data-feather="plus"></i><span>Jurnal</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="{{ asset('Template/img/icons/filter.svg') }}">
                                        <span><img src="{{ asset('Template/img/icons/closes.svg" alt="img') }}"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('Template/img/icons/search-white.svg') }}"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="{{ route('generate.pdf') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
                                            <img src="{{ asset('Template/img/icons/pdf.svg') }}">
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ asset('Template/img/icons/excel.svg') }}"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ asset('Template/img/icons/printer.svg ') }}"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>Rekening</th>
                                        <th>Nominal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembukuan as $index => $pembukuan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pembukuan->servis->tanggal_selesai ?? '-' }}</td>
                                            <td>{{ $pembukuan->servis->profile->user->name ?? '-' }}</td>
                                            <td>{{ $pembukuan->akun->nama ?? '-' }}</td>
                                            <td>{{ $pembukuan->saldo }}</td>
                                            <td>
                                                <a href="{{ route('laporan.edit', $pembukuan->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary"><i class="fa fa-edit"></i> Edit</span>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('laporan.destroy', $pembukuan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('laporan.show', $pembukuan->id) }}" title="Detail Pembukuan">
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
