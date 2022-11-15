<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Guru';
        $teachers = Teacher::paginate(10);

        return view('admin.teacher.index', [
            'title' => $title,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Guru';

        return view('admin.teacher.create', [
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
            'photo' => 'required|mimes:jpg,png,jpeg',
            'role' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama program wajib diisi.',
            'photo.required' => 'Foto wajib diisi.',
            'role.required' => 'Role wajib diisi.',   
        ];

        $this->validate($request, $rules, $messages);

        DB::beginTransaction();
        try {
            $teacher = Teacher::create([
                'name' => $request->name,
                'role' => $request->role,
            ]);


            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $fileName = 'teachers/' . time() . '_' .$teacher->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $teacher->update([
                    'photo' => $fileName
                ]);
            }
            
            DB::commit();

            return redirect()->back()->with('success', 'Data guru telah berhasil ditambahkan.');
            
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Data guru gagal ditambahkan. Silahkan hubungi developer untuk segera dilakukan perbaikan. ' . $th->getMessage());
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
    public function edit(Teacher $teacher)
    {
        $title = 'Edit Guru';

        return view('admin.teacher.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'mimes:jpg,png,jpeg',
            'role' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama guru wajib diisi.',
            'photo.required' => 'Foto wajib diisi.',
            'role.required' => 'Role wajib diisi.',   
        ];

        $this->validate($request, $rules, $messages);

        DB::beginTransaction();
        try {
            $teacher->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);


            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $fileName = 'teachers/' . time() . '_' .$teacher->name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $teacher->update([
                    'photo' => $fileName
                ]);
            }
            
            DB::commit();

            return redirect()->back()->with('success', 'Data guru telah berhasil diperbarui.');
            
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Data guru gagal diperbarui. Silahkan hubungi developer untuk segera dilakukan perbaikan. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
