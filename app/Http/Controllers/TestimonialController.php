<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use DB;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Testimoni';
        $testimonials = Testimonial::paginate(10);

        return view('admin.testimonial.index',[
            'title' => $title,
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Testimoni';

        return view('admin.testimonial.create',[
            'title' => $title
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
            'child_name' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'message' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama orang tua wajib diisi.',
            'child_name.required' => 'Nama anak wajib diisi.',
            'photo.required' => 'Foto wajib diisi.',
            'message.required' => 'Pesan wajib diisi.', 
        ];

        $this->validate($request, $rules, $messages);

        DB::beginTransaction();
        try {
            $testimonial = Testimonial::create([
                'name' => $request->name,
                'child_name' => $request->child_name,
                'message' => $request->message,
            ]);
    
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $fileName = 'testimonials/' . time() . '_' .$testimonial->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $testimonial->update([
                    'photo' => $fileName
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data testimoni berhasil ditambahkan!');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data testimoni gagal ditambahkan! Silahkan coba lagi atau hubungi developer untuk perbaikan!' . $th->getMessage());
            //throw $th;
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
    public function edit(Testimonial $testimonial)
    {
        $title = 'Edit Testimonial';

        return view('admin.testimonial.edit', [
            'title' => $title,
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $rules = [
            'name' => 'required',
            'child_name' => 'required',
            'photo' => 'mimes:jpg,png,jpeg',
            'message' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama orang tua wajib diisi.',
            'child_name.required' => 'Nama anak wajib diisi.',
            'photo.required' => 'Foto wajib diisi.',
            'message.required' => 'Pesan wajib diisi.', 
        ];

        $this->validate($request, $rules, $messages);

        DB::beginTransaction();
        try {
            $testimonial->update([
                'name' => $request->name,
                'child_name' => $request->child_name,
                'message' => $request->message,
            ]);
    
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $fileName = 'testimonials/' . time() . '_' .$testimonial->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $testimonial->update([
                    'photo' => $fileName
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data testimoni berhasil diperbarui!');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data testimoni gagal diperbarui! Silahkan coba lagi atau hubungi developer untuk perbaikan!' . $th->getMessage());
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Data testimoni berhasil dihapus!');
    }
}
