@extends('admin.layouts.master')

@section('header')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
              <h1>{{ $title }}</h1>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Tim</li>
                <li class="breadcrumb-item active">Tambah Anggota Tim</li>
            </ol>
        </nav>
    </div>
    <div class="col-6">
        @include('admin.layouts.partials.alert')
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body pt-3">
            <form action="{{ route('admin.member.store') }}" method="post" enctype="multipart/form-data">
                @csrf 

                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Role -->
                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role/Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" value="{{ old('role') }}">
                        @error('role')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Avatar -->
                <div class="row mb-3">
                    <label for="avatar_url" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('avatar_url') is-invalid @enderror" name="avatar_url" id="avatar_url">
                        @error('avatar_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success float-end"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection