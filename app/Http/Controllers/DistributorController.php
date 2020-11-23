<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            $distributors = Distributor::all();
            return datatables()->of($distributors)
            ->addColumn('action', 'distributors.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('distributors.index');
    }


    public function create()
    {
        return view('distributors.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
    
        Distributor::create($request->all());
     
        return redirect()->route('distributors.index')
                        ->with('success','Distributor created successfully.');
    }


    public function edit(Distributor $distributor)
    {
        return view('distributors.edit',compact('distributor'));

    }


    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
    
        $distributor->update($request->all());
    
        return redirect()->route('distributors.index')
                        ->with('success','Distributor updated successfully');
    }


    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
    
        return redirect()->route('distributors.index')
                        ->with('success','Distributor deleted successfully');
    }
}
