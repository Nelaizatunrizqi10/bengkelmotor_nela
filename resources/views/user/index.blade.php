@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-title">
                <h3>Data User</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/user/create" class="btn btn-added"><i data-feather="plus"></i><span>User</span></a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" title="Ubah Data">
                                                    <span class="badge bg-primary">
                                                        <i class="fa fa-edit">Edit</i>
                                                    </span>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus User Ini?');">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <a href="{{ route('user.show', $user->id) }}" title="Detail Barang">
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
