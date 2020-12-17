<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }elseif(Auth::user()->role == 'kasir'){
            return redirect()->route('kasir.dashboard');
        }elseif(Auth::user()->role == 'manager'){
            return redirect()->route('manager.dashboard');
        }
    }
}
