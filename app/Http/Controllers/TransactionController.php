<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
           
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $user = Auth::id();
        $data  = Item::where('stok_barang', '>', 0)->get();
        $transaction = Transaction::all();

        return view('transactions.create', compact('data', 'user', 'transaction'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'jumlah_beli' => 'required',
            'total_harga' => 'required',
            'tanggal_beli' => 'required',
        ]);

        $data = Item::find($request->id_barang);
        $total_harga = $request->jumlah_beli * $data->harga_barang;

        $sisa_stok = $data->stok_barang - $request->jumlah_beli;
        
        $data->update([
            'stok_barang' => $sisa_stok
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi created successfully.');
    }


    public function edit(Transaction $transaction)
    {
        return view('transactions.index', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'jumlah_beli' => 'required',
            'total_harga' => 'required',
            'tanggal_beli' => 'required',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi created successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi created successfully.');
    }


}
