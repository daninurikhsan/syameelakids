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
                <li class="breadcrumb-item active">Guru</li>
            </ol>
        </nav>
    </div>
    <div class="col-6">
        <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i> Tambah Guru</a>
    </div>
</div>
@endsection

@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body pt-3">

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"><img src="{{ asset('storage/' . $teacher->photo) }}" width="50px"></td>
                            <td class="text-center">{{ $teacher->name }}</td>
                            <td class="text-center">{{ $teacher->role }}</td>
                            <td class="text-center">
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-warning pd-2"><i class="bi bi-pen me-1"></i> Edit</a>

                                <a href="{{ route('teacher.destroy', $teacher->id) }}" class="btn btn-sm btn-danger pd-2" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini?')){ event.preventDefault(); document.getElementById('form').submit(); }else{ return false; }" >
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </a>
                                <form id="form" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty 
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{ $teachers->links() }}
        </div>
    </div>

</div>
@endsection