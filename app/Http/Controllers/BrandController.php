<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Datatables;

class BrandController extends Controller
{

    public function index()
    {

        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }

    
    public function create()
    {
        return view('brands.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required',
        ]);
    
        Brand::create($request->all());
     
        return redirect()->route('brands.index')
                        ->with('success','Merek created successfully.');
    }

    
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));

    }


    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'nama_merek' => 'required',
        ]);
    
        $brand->update($request->all());
    
        return redirect()->route('brands.index')
                        ->with('success','Merek updated successfully');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
    
        return redirect()->route('brands.index')
                        ->with('success','Merek deleted successfully');
    }
}
