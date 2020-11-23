<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Distributor;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $items = Item::all();
            return datatables()->of($items)
            ->addColumn('action', 'items.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('items.index');
    }

    public function create()
    {
        $brands = Brand::all();
        $distributors = Distributor::all();

        return view('items.create', compact('brands', 'distributors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'id_merek' => 'required',
            'id_distributor' => 'required',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required',
        ]);
    
        Item::create($request->all());
     
        return redirect()->route('items.index')
                        ->with('success','Item created successfully.');
    }


    public function edit(Item $item)
    {
        $brands = Brand::all();
        $distributors = Distributor::all();

        return view('items.edit',compact('item', 'brands', 'distributors'));

    }


    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required',
            'id_merek' => 'required',
            'id_distributor' => 'required',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required',
        ]);
    
        $item->update($request->all());
    
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }


    public function destroy(Item $item)
    {
        $item->delete();
    
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    }
}
