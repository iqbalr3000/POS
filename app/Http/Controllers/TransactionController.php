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

        $user = Auth::user()->id;

        return view('kasir.transactions.index', compact('transactions', 'data', 'total', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah_beli' => 'required',
            'status' => 'required',
        ]);

        $data = Item::find($request->id_barang);

            $sisa_stok = $data->stok_barang - $request->jumlah_beli;
            
            $data->update([
                'stok_barang' => $sisa_stok
            ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi created successfully.');
    }

    public function destroy(Transaction $transaction)
    {

        $data = Item::find($transaction->id_barang);
            $sisa_stok = $data->stok_barang + $transaction->jumlah_beli;
            
            $data->update([
                'stok_barang' => $sisa_stok
            ]);

        $transaction->delete();

        return redirect()->route('transactions.index')
                        ->with('success','Transaksi deleted successfully.');
    }


}
