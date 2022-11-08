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
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </nav>
    </div>
    <div class="col-6">
        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i> Tambah Produk</a>
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
                    <th class="text-center">Harga</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"><img src="/storage/{{ $product->img_url }}" width="100px"></td>
                            <td class="text-center"><a href="{{ $product->product_url }}" target="_blank" rel="noopener noreferrer">{{ $product->name }}</a></td>
                            <td class="text-center">@rupiah($product->price)</td>
                            <td class="text-center">
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-warning pd-2"><i class="bi bi-pen me-1"></i> Edit</a>
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="post" onSubmit="return alert('Apakah anda yakin ingin menghapus {{ $product->name }} dari database?'); return false;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger pt-2"><i class="bi bi-trash me-1"></i> Hapus</button>
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
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection