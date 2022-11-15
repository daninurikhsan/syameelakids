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
                <li class="breadcrumb-item">Testimonial</li>
                <li class="breadcrumb-item active">{{ $testimonial->name }}</li>
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

            <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="Profile" class="rounded-circle">
            <h2 class="text-center">{{ $testimonial->name }}</h2>
            <h3>{{ $testimonial->role }}</h3>
        </div>
    </div>

</div>

<div class="col-lg-8">

    <div class="card">
        <div class="card-body pt-3">
            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                
                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $testimonial->name) }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Child Name -->
                <div class="row mb-3">
                    <label for="child_name" class="col-sm-2 col-form-label">Nama Anak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('child_name') is-invalid @enderror" name="child_name" id="child_name" value="{{ old('child_name', $testimonial->child_name) }}">
                        @error('child_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Avatar -->
                <div class="row mb-3">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo">
                        @error('photo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Message -->
                <div class="row mb-3">
                    <label for="message" class="col-sm-2 col-form-label">Pesan</label>
                    <div class="col-sm-10">
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="5">{{ old('message', $testimonial->message) }}</textarea>
                        @error('message')
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