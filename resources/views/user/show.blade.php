@extends('Layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Detail Data User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data user</a></li>
                        <li class="breadcrumb-item active">Detail Data user</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Data User</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID User</label>
                            <p>{{ $user->id }}</p>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <p>{{ $user->name }}</p>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <p>{{ $user->email }}</p>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <p>{{ $user->role }}</p>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('user.index') }}" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
