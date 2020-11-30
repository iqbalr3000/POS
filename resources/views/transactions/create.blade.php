@extends('layouts.app')
 
@section('content')
        <h1 class="mt-4">Transaksi</h1>
        <br>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Buat Transaksi</li>
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
        
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID Barang:</strong>
                        <select class="form-control" name="id_barang" id="id_barang">
                            <option value disable>Pilih ID Barang</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" data-harga="{{$item->harga_barang}}" data-stok="{{$item->stok_barang}}">
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID User:</strong>
                    <input type="text" name="id_user" id="id_user" class="form-control" placeholder="Masukan id user" value="{{ $user }}" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Beli:</strong>
                        <input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control" placeholder="Masukan jumlah beli">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Harga:</strong>
                    <input type="number" name="total_harga" id="total_harga" class="form-control" placeholder="Masukan total harga" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Beli:</strong>
                        <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control" placeholder="Masukan tanggal beli">
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('transactions.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>

        <script>
            jQuery(document).ready(function(){
            
                jQuery('select').change(function(){
                  let harga = jQuery(this).find(':selected').data('harga');
                  let stok = jQuery(this).find(':selected').data('stok');
            
                  jQuery('#jumlah_beli').keyup(function(){
                      let jumlah_beli = jQuery('#jumlah_beli').val()
                      if(jumlah_beli > stok){
                        jQuery('#jumlah_beli').val();
                        alert('Stok Tidak Mencukupi');
                      }else{
                        let total = parseInt(harga) * parseInt(jumlah_beli)
            
                        if (harga == "kosong") {
                            total = ""
                        }
            
                        if (jumlah_beli == "") {
                            total = ""
                        }
            
                        console.log(total);
                        if(!isNaN(total)){
                            jQuery('#total_harga').val(total)
                        }
                      }
                  })
              })
            });
        </script>
@endsection

