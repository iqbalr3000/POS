@extends('layouts.app')
 
@section('content')
        <h1 class="mt-4">Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Edit Transaksi</li>
        </ol>
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <form action="{{ route('items.update',$item->id) }}" method="POST">
            @csrf
            @method('PUT')
    
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-row">
                        <div class="form-group">
                            <strong>ID Merek:</strong>
                            <select class="form-control">
                                <option value=''>Pilih ID Merek</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"@if($brand->id == $item->id_merek) selected @endif>
                                        {{ $brand->nama_merek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID User:</strong>
                        <input type="date" name="id_user" value="{{ $transaction->id_user }}" class="form-control" placeholder="Masukan id user">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Barang:</strong>
                        <input type="text" name="harga_barang" value="{{ $transaction->harga_barang }}" class="form-control" placeholder="Masukan harga barang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Beli:</strong>
                        <input type="text" name="stok_barang" value="{{ $transaction->jumlah_beli }}" class="form-control" placeholder="Masukan jumlah beli">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Harga:</strong>
                        <input type="text" name="total_harga" value="{{ $transaction->total_harga }}" class="form-control" placeholder="Masukan total harga">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Beli:</strong>
                        <input type="date" name="tanggal_beli" value="{{ $transaction->tanggal_beli }}" class="form-control" placeholder="Masukan tanggal beli">
                    </div>
                </div>
                
 
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('transactions.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    
        </form>
      
@endsection