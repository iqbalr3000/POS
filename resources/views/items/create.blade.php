@extends('layouts.app')
 
@section('content')
        <h1 class="mt-4">Barang</h1>
        <br>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Barang</li>
            <li class="breadcrumb-item active">Buat Barang</li>
        </ol>

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
        
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name Barang:</strong>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukan nama barang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <strong>ID Merek:</strong>
                            <select class="form-control" name="id_merek">
                                <option value disable>Pilih ID Merek</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">
                                        {{ $brand->nama_merek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <strong>ID Distirbutor:</strong>
                            <select class="form-control" name="id_distributor">
                                <option value disable>Pilih ID Distributor</option>
                                @foreach ($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">
                                        {{ $distributor->nama_distributor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Masuk:</strong>
                        <input type="date" name="tanggal_masuk" class="form-control" placeholder="Masukan tanggal masuk">
                    </div>
                </div><div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga Barang:</strong>
                        <input type="text" name="harga_barang" class="form-control" placeholder="Masukan harga barang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stok Barang:</strong>
                        <input type="text" name="stok_barang" class="form-control" placeholder="Masukan stok barang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
                        <textarea type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan"></textarea>
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('items.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>
      
@endsection