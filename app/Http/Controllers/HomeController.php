<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Brand;
use App\Models\Distributor;
use App\Models\Item;
use App\Models\Transaction;

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
        $brands = Brand::all();
        $distributors = Distributor::all();
        $items = Item::all();
        $transactions = Transaction::all(); 

        if (Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard', compact('brands', 'distributors', 'items', 'transactions'));
        }elseif(Auth::user()->role == 'kasir'){
            return redirect()->route('kasir.dashboard', compact('brands', 'distributors', 'items', 'transactions'));
        }elseif(Auth::user()->role == 'manager'){
            return redirect()->route('manager.dashboard', compact('brands', 'distributors', 'items', 'transactions'));
        }
    }
}
