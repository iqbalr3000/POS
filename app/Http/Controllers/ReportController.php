<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Item;

use App\Exports\TransactionExport;
use App\Exports\ItemExport;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $transaction = Transaction::latest()->paginate(5);
 
        return view('reports.transaction',compact('transaction'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function barang()
    {
        $barang = Item::latest()->paginate(5);

        return view('reports.item',compact('barang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);

        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $transaction = Transaction::whereBetween('tanggal_beli', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('reports.transaction', compact('transaction', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function search(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $barang = Item::whereBetween('tanggal_masuk', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('reports.item', compact('barang', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function export_excel_transaction()
	{
		return Excel::download(new TransactionExport, 'Laporan Transaksi.xlsx');
    }
    
    public function export_excel_item()
	{
		return Excel::download(new ItemExport, 'Laporan Barang.xlsx');
	}
}
