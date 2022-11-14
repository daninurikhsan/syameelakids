<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Program\Store as ProgramStore;
use App\Models\Program;
use App\Models\ProgramSession;
use DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Program';
        $programs = Program::paginate(10);

        return view('admin.program.index', [
            'title' => $title,
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Program';

        return view('admin.program.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'bg_cover' => 'required|mimes:jpg,png,jpeg',
            'short_description' => 'required',
            'description' => 'required',
            'is_package' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama program wajib diisi.',
            'bg_cover.required' => 'Cover wajib diisi.',
            'short_description.required' => 'Deskripsi singkat wajib diisi.',
            'description.required' => 'Deskripsi lengkap wajib diisi.',
            'is_package.required' => 'Pilihan ini wajib diisi.',    
            'price_per_session.required' => 'Harga Setiap Pertemuan wajib diisi.',    
            'price.*.required' => 'Harga paket wajib diisi.',    
            'total_session.*.required' => 'Jumlah pertemuan wajib diisi.',    
            'note.*.required' => 'Target/Kategori/Waktu/Keterangan wajib diisi.',    
        ];

        if($request->is_package == 1){
            for ($i=0; $i < count($request->price); $i++) { 
                $rules['price.' . $i] = 'required';
                $rules['total_session.' . $i] = 'required';
                $rules['note.' . $i] = 'required';
            }
        }else{
            $rules['price_per_session'] = 'required';
        }

        $this->validate($request, $rules, $messages);

        // dd(count($request->price));
        DB::beginTransaction();
        try {
            $program = Program::create([
                'name' => $request->name,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'is_package' => $request->is_package,
                'price_per_session' => $request->price_per_session,
            ]);

            if($request->is_package == 1){
                for ($i=0; $i < count($request->price); $i++) { 
                    $programSession = ProgramSession::create([
                        'program_id' => $program->id,
                        'price' => $request->price[$i],
                        'session' => $request->total_session[$i],
                        'note' => $request->note[$i],
                    ]);
                }
            }

            if($request->hasFile('bg_cover')){
                $file = $request->file('bg_cover');
                $fileName = 'programs/' . time() . '_' .$program->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $program->update([
                    'bg_cover' => $fileName
                ]);
            }
            
            DB::commit();

            return redirect()->back()->with('success', 'Data program telah berhasil ditambahkan.');
            
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Data program gagal ditambahkan. Silahkan hubungi developer untuk segera dilakukan perbaikan. ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $title = 'Edit Program';

        return view('admin.program.edit', [
            'title' => $title,
            'program' => $program,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $rules = [
            'name' => 'required',
            'bg_cover' => 'mimes:jpg,png,jpeg',
            'short_description' => 'required',
            'description' => 'required',
            'is_package' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama program wajib diisi.',
            'bg_cover.required' => 'Cover wajib diisi.',
            'short_description.required' => 'Deskripsi singkat wajib diisi.',
            'description.required' => 'Deskripsi lengkap wajib diisi.',
            'is_package.required' => 'Pilihan ini wajib diisi.',    
            'price_per_session.required' => 'Harga Setiap Pertemuan wajib diisi.',    
            'price.*.required' => 'Harga paket wajib diisi.',    
            'total_session.*.required' => 'Jumlah pertemuan wajib diisi.',    
            'note.*.required' => 'Target/Kategori/Waktu/Keterangan wajib diisi.',    
        ];

        if($request->is_package == 1){
            for ($i=0; $i < count($request->price); $i++) { 
                $rules['price.' . $i] = 'required';
                $rules['total_session.' . $i] = 'required';
                $rules['note.' . $i] = 'required';
            }
        }else{
            $rules['price_per_session'] = 'required';
        }

        $this->validate($request, $rules, $messages);

        // dd(count($request->price));
        DB::beginTransaction();
        try {
            $program->update([
                'name' => $request->name,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'is_package' => $request->is_package,
                'price_per_session' => $request->price_per_session,
            ]);

            if($request->is_package == 1){
                $programSessionDelete = ProgramSession::where('program_id', $program->id)->get()->each->delete();
                for ($i=0; $i < count($request->price); $i++) {
                    $programSession = ProgramSession::create([
                        'program_id' => $program->id,
                        'price' => $request->price[$i],
                        'session' => $request->total_session[$i],
                        'note' => $request->note[$i],
                    ]);
                }
            }

            if($request->hasFile('bg_cover')){
                $file = $request->file('bg_cover');
                $fileName = 'programs/' . time() . '_' .$program->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $program->update([
                    'bg_cover' => $fileName
                ]);
            }
            
            DB::commit();

            return redirect()->back()->with('success', 'Data program telah berhasil diperbarui.');
            
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Data program gagal diperbarui. Silahkan hubungi developer untuk segera dilakukan perbaikan. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->back()->with('success', 'Data program telah berhasil diperbarui.');
    }
}
