@extends('layouts.layout')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="{{ asset('/storage/profile/'.$profile->image) }}" alt="img" id="blah" class="profile-img-circle" data-bs-toggle="modal" data-bs-target="#imageModal">
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $profile->user->name }}</h2>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('profile.index') }}" class="btn btn-cancel">Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Nomor Plat</label>
                            <input type="text" value="{{ $profile->no_plat }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" value="{{ $profile->merek }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" value="{{ $profile->alamat }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" value="{{ $profile->hp }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Profile Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('/storage/profile/'.$profile->image) }}" class="img-fluid" alt="Full-size image">
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .profile-contentimg {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        display: flex; 
        justify-content: center; 
        align-items: center; 
        cursor: pointer;
    }

    .profile-img-circle {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<!-- Include Bootstrap CSS and JavaScript -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
