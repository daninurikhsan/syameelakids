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
                <li class="breadcrumb-item active">Program</li>
            </ol>
        </nav>
    </div>
    <div class="col-6">
        <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i> Tambah Program</a>
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
                    <th class="text-center">Nama</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Paket/Non Paket</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $program)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"><a href="{{ $program->program_url }}" target="_blank" rel="noopener noreferrer">{{ $program->name }}</a></td>
                            <td class="text-center">
                                @if($program->price_per_session != null)
                                    @rupiah($program->price_per_session)/Pertemuan
                                @else 
                                    @foreach($program->sessions as $session)
                                        {{ $session->note }} : @rupiah($session->price)/Bulan ({{ $session->session }}x Pertemuan)<br>
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $program->is_package == 0 ? 'Non Paket' : 'Paket' }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('program.edit', $program->id) }}" class="btn btn-sm btn-warning pd-2"><i class="bi bi-pen me-1"></i> Edit</a>

                                <a href="#" class="btn btn-sm btn-danger pd-2" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini?')){ event.preventDefault(); document.getElementById('form-{{ $program->id }}').submit(); }else{ return false; }" >
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </a>
                                
                                <form id="form-{{ $program->id }}" action="{{ route('program.destroy', $program->id) }}" method="POST" class="d-none">
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
            {{ $programs->links() }}
        </div>
    </div>

</div>
@endsection