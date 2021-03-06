<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{

    public function index()
    {
        $distributors = Distributor::all();

        return view('admin.distributors.index', compact('distributors'));
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
        return view('admin.distributors.edit',compact('distributor'));

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
