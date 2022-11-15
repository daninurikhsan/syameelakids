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
                <li class="breadcrumb-item">Guru</li>
                <li class="breadcrumb-item active">{{ $teacher->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-6">
        @include('admin.layouts.partials.alert')
    </div>
</div>
@endsection

@section('content')
<div class="col-xl-4 profile">

    <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ asset('storage/'. $teacher->photo) }}" alt="" class="img-circle">
            <h2 class="text-center mb-2"><a target="_blank" href="#">{{ $teacher->name }}</a></h2>
            
            

        </div>
    </div>

</div>

<div class="col-lg-8">

    <div class="card">
        <div class="card-body pt-3">
        <form action="{{ route('teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $teacher->name) }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Photo -->
                <div class="row mb-3">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ old('photo') }}">
                        @error('photo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Role -->
                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" value="{{ old('role', $teacher->role) }}">
                        @error('role')
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