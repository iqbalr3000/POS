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

        return view('admin.brands.index', compact('brands'));
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
        return view('admin.brands.edit',compact('brand'));

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
