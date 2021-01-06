<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailTransaction;
use App\Models\Transaction;

class DetailTransactionController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'total_bayar' => 'required',
            'uang_bayar' => 'required',
            'kembalian' => 'required',
            'tanggal_beli' => 'required',

        ]);

        $data = Transaction::find($request->id);
            $data->update([
                'status' => 'Sudah bayar',
            ]);
    
        DetailTransaction::create($request->all());
     
        return redirect()->route('transaction.index')
                        ->with('success','Transaction created successfully.');
    }

    
}
