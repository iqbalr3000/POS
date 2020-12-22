<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailTransaction;


class DetailTransactionController extends Controller
{
    public function index()
    {
        $data = DetailTransaction::all();

        return view('', compact('data'));
    }

    
}
