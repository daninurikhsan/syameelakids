@extends('admin.layouts.master')


@section('header')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
</div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</nav>
@endsection

@section('content')
<!-- Program Card -->
<div class="col-xl-4 col-md-6">
    <div class="card info-card sales-card">

    <div class="card-body">
        <h5 class="card-title">Program <span>| Today</span></h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-window"></i>
            </div>
            <div class="ps-3">
                <h6>{{ $countProgram }}</h6>
                <span class="text-muted small pt-2 ps-1">Jumlah Total</span>

            </div>
        </div>
    </div>

    </div>
</div><!-- End Program Card -->

<!-- Teacher Card -->
<div class="col-xl-4 col-md-6">
    <div class="card info-card sales-card">

    <div class="card-body">
        <h5 class="card-title">Guru <span>| Today</span></h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
            </div>
            <div class="ps-3">
                <h6>{{ $countTeacher }}</h6>
                <span class="text-muted small pt-2 ps-1">Jumlah Total</span>

            </div>
        </div>
    </div>

    </div>
</div><!-- End Teacher Card -->

<!-- Testimonial Card -->
<div class="col-xl-4 col-md-6">
    <div class="card info-card sales-card">

    <div class="card-body">
        <h5 class="card-title">Testimoni <span>| Today</span></h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-input-cursor"></i>
            </div>
            <div class="ps-3">
                <h6>{{ $countTestimonial }}</h6>
                <span class="text-muted small pt-2 ps-1">Jumlah Total</span>

            </div>
        </div>
    </div>

    </div>
</div><!-- End Testimonial Card -->
@endsection