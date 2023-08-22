@extends('index')

@section('content')

<div class="card shadow-lg mx-4">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('/assets/img/team-1.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ $user->name }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ $user->role->role }}
            </p>
          </div>
        </div>
        <div class="col-8" style="float:right" align="right">
          <div class="avatar avatar-xl position-relative" style="float:right">
            <img style="float:right" src="data:image/png;base64,{{DNS2D::getBarcodePNG($userId, "QRCODE", 3,3)}}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <form method="POST" action="{{ route('user.update',[auth()->id()]) }}">
    @csrf
    @method('PUT')
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                <p class="mb-0">Data User</p>
                </div>
            </div>
            <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" readonly name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" readonly name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" readonly name="alamat" value="{{ $user->alamat }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No Telepon</label>
                    <input class="form-control" type="text" readonly name="no_tlp" value="{{ $user->no_tlp }}">
                    </div>
                </div>
                </div>
                <hr class="horizontal dark">
            </div>
            </div>
        </div>
        </div>
    </div>
  </form>
@endsection
