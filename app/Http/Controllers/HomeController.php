<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main', [
            ' title' => 'Admin'
        ]);
        // return view(
        //     'main',
        //     [
        //         'title' => 'Admin'
        //     ]
        // );
    }

    

    public function kantinHome()
    {
        return view('kantinHome');
    }

    public function tefaHome()
    {
        return view('tefaHome');
    }

    public function dharmawanitaHome()
    {
        return view('dharmawanitaHome');
    }

    public function kasirHome()
    {
        return view('kasirhome');
    }
}
