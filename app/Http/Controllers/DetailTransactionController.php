<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailTransaction;
use App\Models\Transaction;

class DetailTransactionController extends Controller
{

    public function store(Request $request, Transaction $transaction)
    {
        $request->validate([
            'id_user' => 'required',
            'total_bayar' => 'required',
            'uang_bayar' => 'required',
            'kembalian' => 'required',
            'tanggal_beli' => 'required',

        ]);
    
        if ($request->uang_bayar < $request->total_bayar) {
            return redirect()->back()->with('alert','Uang yang anda masukan kurang.');

        } else {
            Transaction::where('status', '=', 'Belum Bayar')->update(['status' => 'Sudah Bayar']);

            DetailTransaction::create($request->all());
        
            return redirect()->route('transactions.index')
                            ->with('success','Pembayaran selesai.');
        }
    }

}
