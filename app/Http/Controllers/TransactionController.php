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
        $transactions = Transaction::all()->where('status', '=', 'Belum Bayar');
        $data  = Item::where('stok_barang', '>', 0)->get();

        $total = Transaction::all()->where('status', '=', 'Belum Bayar')->sum('total_harga');

        return view('kasir.transactions.index', compact('transactions', 'data', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah_beli' => 'required',
            'status' => 'required',
        ]);

        $data = Item::find($request->id_barang);
            $total_harga = $request->jumlah_beli * $data->harga_jual;

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
        $data  = Item::where('stok_barang', '>', 0)->get();
        
        return view('kasir.transactions.edit', compact('transaction', 'data'));
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
                        ->with('success','Transaksi updated successfully.');
    }

    public function destroy(Request $request, Transaction $transaction)
    {
        $transaction->delete();

        $data = Item::find($request->id_barang);

            $sisa_stok = $data->stok_barang + $request->jumlah_beli;
            
            $data->update([
                'stok_barang' => $sisa_stok
            ]);

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi deleted successfully.');
    }


}
