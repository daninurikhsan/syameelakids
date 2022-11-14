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
                <li class="breadcrumb-item">Produk</li>
                <li class="breadcrumb-item active">{{ $program->name }}</li>
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

            <h2 class="text-center mb-2"><a target="_blank" href="#">{{ $program->name }}</a></h2>
            <a href="#" class="mb-1" data-bs-toggle="modal" data-bs-target="#basicModal">Lihat Background</a>
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="{{ asset('storage/'. $program->bg_cover) }}" width="550px">
                        </center>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>

            <table class="table">
                <tr>
                    <td>Kategori</td>
                    <td>{{ $program->is_package == 0 ? 'Non Paket' : 'Paket' }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        @if($program->price_per_session != null)
                            @rupiah($program->price_per_session)/Pertemuan
                        @else 
                            @foreach($program->sessions as $session)
                                {{ $session->note }} :<br> @rupiah($session->price)/Bulan ({{ $session->session }}x Pertemuan) <br><br>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

<div class="col-lg-8">

    <div class="card">
        <div class="card-body pt-3">
        <form action="{{ route('program.update', $program->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $program->name) }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Cover -->
                <div class="row mb-3">
                    <label for="bg_cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('bg_cover') is-invalid @enderror" name="bg_cover" id="bg_cover" value="{{ old('bg_cover') }}">
                        @error('bg_cover')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi Singkat -->
                <div class="row mb-3">
                    <label for="short_description" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description" value="{{ old('short_description', $program->short_description) }}">
                        @error('short_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="4">{{ old('description', $program->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Paket -->
                <fieldset class="row mb-3 ">
                    <legend class="col-form-label col-sm-2 pt-0 is-invalid">Apakah ini Paket?</legend>
                    <div class="col-sm-10">
                        <div class="form-check ">
                        <input class="form-check-input @error('is_package') is-invalid @enderror" type="radio" name="is_package" id="package_yes" value="1" {{ old('is_package', $program->is_package) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="package_yes">
                            Ya, ini adalah paket
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input @error('is_package') is-invalid @enderror" type="radio" name="is_package" id="package_no" value="0" {{ old('is_package', $program->is_package) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="package_no">
                            Bukan, ini adalah program setiap pertemuan
                        </label>
                        </div>
                        
                    </div>
                </fieldset>

                <!-- Harga Setiap Pertemuan -->
                <div class="row mb-3">
                    <label for="price_per_session" class="col-sm-2 col-form-label">Harga Setiap Pertemuan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('price_per_session') is-invalid @enderror" name="price_per_session" id="price_per_session" value="{{ old('price_per_session', $program->price_per_session) }}">
                        <small><i>Wajib diisi untuk non-paket. Untuk harga paket silahkan isi pada form dibawah.</i></small>
                        @error('price_per_session')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div id="package-info">
                <!--------------------- Paket --------------------->
                @if($errors->has('price.*') or $errors->has('total_session.*') or $errors->has('note.*'))
                    @php 
                        $countPrice = json_encode(count(session()->getOldInput()['price']));
                        $countTotalSession = json_encode(count(session()->getOldInput()['total_session']));
                        $countNote = json_encode(count(session()->getOldInput()['note']));

                        $totalError = max($countPrice, $countTotalSession, $countNote);
                    @endphp
                    @for($i=0; $i < $totalError; $i++)
                        <div id="package-info">
                            <hr>
                            <!-- Harga Paket -->
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Harga Paket</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('price.' . $i) is-invalid @enderror" name="price[{{ $i }}]" id="price" value="{{ old('price.' . $i) }}">
                                    <small><i>Wajib diisi untuk paket.</i></small>
                                    @error('price.'. $i)
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
            
                            <!-- Jumlah Pertemuan -->
                            <div class="row mb-3">
                                <label for="total_session" class="col-sm-2 col-form-label">Jumlah Pertemuan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('total_session.'. $i) is-invalid @enderror" name="total_session[{{ $i }}]" id="total_session" value="{{ old('total_session.' . $i) }}">
                                    <small><i>Wajib diisi untuk paket.</i></small>
                                    @error('total_session.'. $i)
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
            
                            <!-- Target/Kategori/Waktu/Keterangan -->
                            <div class="row mb-3">
                                <label for="note" class="col-sm-2 col-form-label">Target/Kategori/Waktu/Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('note.'. $i) is-invalid @enderror" name="note[{{ $i }}]" id="note" value="{{ old('note.'. $i) }}">
                                    <small><i>Wajib diisi untuk paket. Misal, 1 Jam, 1.5 Jam, Dewasa dan Anak, Kelas 1-3 SD, Kelas 4-6 SD, dll.</i></small>
                                    @error('note.' . $i)
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    @endfor
                @else
                    @if($program->is_package == 1)
                        @foreach($program->sessions as $session)
                            <hr>
                            <!-- Harga Paket -->
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Harga Paket</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('price.0') is-invalid @enderror" name="price[]" id="price" value="{{ old('price.0', $session->price) }}">
                                    <small><i>Wajib diisi untuk paket.</i></small>
                                    @error('price.0')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
            
                            <!-- Jumlah Pertemuan -->
                            <div class="row mb-3">
                                <label for="total_session" class="col-sm-2 col-form-label">Jumlah Pertemuan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('total_session.0') is-invalid @enderror" name="total_session[]" id="total_session" value="{{ old('total_session.0', $session->session) }}">
                                    <small><i>Wajib diisi untuk paket.</i></small>
                                    @error('total_session.0')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
            
                            <!-- Target/Kategori/Waktu/Keterangan -->
                            <div class="row mb-3">
                                <label for="note" class="col-sm-2 col-form-label">Target/Kategori/Waktu/Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('note.0') is-invalid @enderror" name="note[]" id="note" value="{{ old('note.0', $session->note) }}">
                                    <small><i>Wajib diisi untuk paket. Misal, 1 Jam, 1.5 Jam, Dewasa dan Anak, Kelas 1-3 SD, Kelas 4-6 SD, dll.</i></small>
                                    @error('note.0')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
                </div>
                <div class="row col-3 mb-3">
                    <button type="button" class="btn btn-primary" id="add-category"><i class="bi bi-plus"></i> Tambah Kategori</button>
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

<script>
    let i = parseInt('{{ isset($totalError) ? $totalError : $program->sessions->count() }}');
    console.log(i)
    let categoryGroup = document.querySelector('#package-info');
    let btnAddCategory = document.getElementById('add-category');

    btnAddCategory.addEventListener('click', function (event) {
        i = i + 1;
        let categoryForm = '<hr>' +
                        '<div class="row mb-3"> ' +
                            '<label for="price" class="col-sm-2 col-form-label">Harga Paket</label>' +
                            '<div class="col-sm-10">' +
                                '<input type="number" class="form-control @error("price.'+ i + '") is-invalid @enderror" name="price['+ i + ']" id="price-'+ i + '" value="{{ old("price.'+ i + '") }}">' +
                                '<small><i>Wajib diisi untuk paket.</i></small>' +
                                '@error("price.'+ i + '")' +
                                    '<span class="invalid-feedback">{{ $message }}</span>' +
                                '@enderror' +
                            '</div>' +
                        '</div>' +
        
                        '<!-- Jumlah Pertemuan -->' +
                        '<div class="row mb-3">' +
                            '<label for="total_session" class="col-sm-2 col-form-label">Jumlah Pertemuan</label>' +
                            '<div class="col-sm-10">' +
                                '<input type="number" class="form-control @error("total_session.'+ i + '") is-invalid @enderror" name="total_session['+ i + ']" id="total_session-'+ i + '" value="{{ old("total_session.'+ i + '") }}">' +
                                '<small><i>Wajib diisi untuk paket.</i></small>' +
                                '@error("total_session.'+ i + '")' +
                                    '<span class="invalid-feedback">{{ $message }}</span>' +
                                '@enderror' +
                            '</div>' +
                        '</div>' +
        
                        '<!-- Target/Kategori/Waktu/Keterangan -->' +
                        '<div class="row mb-3">' +
                            '<label for="note" class="col-sm-2 col-form-label">Target/Kategori/Waktu/Keterangan</label>' +
                            '<div class="col-sm-10">' +
                                '<input type="text" class="form-control @error("note.'+ i + '") is-invalid @enderror" name="note['+ i + ']" id="note-'+ i + '" value="{{ old("note.'+ i + '") }}">' +
                                '<small><i>Wajib diisi untuk paket. Misal, 1 Jam, 1.5 Jam, Dewasa dan Anak, Kelas 1-3 SD, Kelas 4-6 SD, dll.</i></small>' +
                                '@error("note.'+ i + '")' +
                                    '<span class="invalid-feedback">{{ $message }}</span>' +
                                '@enderror' +
                            '</div>' +
                        '</div>'
        
        categoryGroup.insertAdjacentHTML('beforeend', categoryForm);

        console.log('test')
    });
    
</script>
@endsection