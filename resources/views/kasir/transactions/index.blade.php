<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aplikasi POS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

    {{-- data table --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Aplikasi POS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard_kasir">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/transactions">Transaksi <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <form action="{{route('logout')}}" method="POST" method="POST" onclick="return confirm('Yakin ?');">
                    @csrf
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Keluar</button>
                </form>
            </div>
        </nav>

        <div class="container">
            <main class="py-4">
                <h1 class="mt-4">Transaksi</h1>
                <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Barang</a>
                        </div>
                        <br>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>ID Barang:</strong>
                                        <select class="form-control" name="id_barang" id="id_barang">
                                            <option value disable>Pilih ID Barang</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}" data-harga="{{$item->harga_jual}}" data-stok="{{$item->stok_barang}}">
                                                    {{ $item->nama_barang }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="status" id="status" class="form-control" placeholder="Masukan status" value="Belum Bayar" hidden>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <h5>Keranjang</h5>
                <table class="table table-striped" id="1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Barang</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>                          
                            <th width="120px">Action</th>
                        </tr>

                    </thead>    
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->id_barang }}</td>
                            <td>{{ $transaction->jumlah_beli }}</td>
                            <td>Rp. {{ $transaction->total_harga }}</td>
                            <td>
                                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody> 
                    <tfoot>
                        <tr>
                            <td colspan="5" class="font-weight-bold">Total Bayar : Rp. {{ $total }}</td>
                        </tr>
                    </tfoot>    
                </table>

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#bayar">Bayar</a>
                        <br>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="bayarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="bayarLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="total_bayar">Total Bayar</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" value="{{ $total }}" readonly>
                                    </div>
                                <div class="form-group">
                                    <label for="uang_bayar">Bayar</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="number" class="form-control" id="uang_bayar" name="uang_bayar" placeholder="Masukan uang bayar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kembalian">Kembalian</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="number" class="form-control" id="kembalian" name="kembalian" readonly>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>


                {{-- javascript --}}
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>

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

                <script>
                    jQuery(document).ready(function(){
                        let total = jQuery('#total_bayar').val()
                        let bayar = jQuery('#uang_bayar').val()

                        let kembalian = parseInt(bayar) - parseInt(total)
                
                            console.log(kembalian);
                            if(!isNaN(kembalian)){
                                jQuery('#kembalian').val(kembalian);
                            }
                    });
                </script>

            </main>
        </div>
    </div>
</body>
</html>