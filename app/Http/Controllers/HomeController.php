<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $programs = Program::all();
        $testimonials = Testimonial::all();

        return view('site.index', [
            'programs' => $programs,
            'testimonials' => $testimonials
        ]);
    }

    public function aboutUs()
    {
        $title = 'Tentang Kami';
        $programs = Program::all();
        $teachers = Teacher::all();

        return view('site.about-us',[
            'title' => $title,
            'programs' => $programs,
            'teachers' => $teachers,
        ]);
    }

    public function contact()
    {
        $title = 'Kontak Kami';
        $programs = Program::all();

        return view('site.contact',[
            'title' => $title,
            'programs' => $programs,
        ]);
    }

    public function home()
    {
        $title = 'Dashboard';
        
        $countProgram = count(Program::all());
        $countTeacher = count(Teacher::all());
        $countTestimonial = count(Testimonial::all());

        return view('admin.home.index', [
            'title' => $title,
            'countTeacher' => $countTeacher,
            'countProgram' => $countProgram,
            'countTestimonial' => $countTestimonial,
        ]);
    }

    public function programDetail($slug){
        $program = Program::where('slug', $slug)->first();
        $programs = Program::all();
        $title = $program->name;

        return view('site.program.detail', [
            'title' => $title,
            'program' => $program,
            'programs' => $programs,
        ]);
    }
}
