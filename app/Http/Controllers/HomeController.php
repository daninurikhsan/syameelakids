<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
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

        return view('site.index', [
            'programs' => $programs
        ]);
    }

    public function aboutUs()
    {
        $title = 'Tentang Kami';
        $programs = Program::all();

        return view('site.about-us',[
            'title' => $title,
            'programs' => $programs,
        ]);
    }

    public function contact()
    {
        $title = 'Kontak Kami';

        return view('site.contact',[
            'title' => $title
        ]);
    }

    public function home()
    {
        $title = 'Dashboard';

        return view('admin.home.index', [
            'title' => $title
        ]);
    }
}
