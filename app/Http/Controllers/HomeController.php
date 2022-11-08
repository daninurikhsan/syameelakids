<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.index');
    }

    public function aboutUs()
    {
        $title = 'Tentang Kami';

        return view('site.about-us',[
            'title' => $title
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
