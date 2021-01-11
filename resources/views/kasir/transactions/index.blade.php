<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS | Brand</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Point of Sales</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <form action="{{route('logout')}}" method="POST" method="POST" onclick="return confirm('Yakin ?');">
                        @csrf
                        <button class="btn btn-danger" type="submit">Keluar</button>
                    </form>
                </li>        
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">POINT OF SALES</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard_kasir" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="transactions" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Brands</h3>
                                </div>

                                <div class="card-body">

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
                                                            <select class="form-control"  name="id_barang" id="id_barang" searchable="Search here..">
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
                                
                                    {{-- @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif --}}
                    
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
                                                <td>{{ $transaction->barang->nama_barang }}</td>
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
                                            <h5 class="modal-title" id="bayarLabel">Bayar Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('bayar') }}" method="POST">
                                                    @csrf
                    
                                                    <div class="form-group">
                                                        <input type="text" name="id_user" id="id_user" class="form-control" placeholder="Masukan ID User" value="{{ $user }}" hidden>
                                                    </div>
                    
                                                    <div class="form-group">
                                                        <label for="tanggal_beli">Tanggal Beli</label>
                                                        <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control" placeholder="Masukan tanggal beli" value="">
                                                    </div>
                    
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
                                                            <input type="number" class="form-control" id="kembalian" name="kembalian" placeholder="Kembalian" readonly>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>        
        </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2020-2021 <a href="#">Iqbalr.id</a>.</strong>
        All rights reserved.
    </footer>

    </div>



    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

    <script>
    $(function () {
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        });
    });
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
        jQuery(document).ready(function() {
            jQuery("#total_bayar, #uang_bayar").keyup(function(){
                let total_bayar  = $("#total_bayar").val()
                let uang_bayar = $("#uang_bayar").val()

                let kembalian = parseInt(uang_bayar) - parseInt(total_bayar);

                if (uang_bayar == "") {
                    kembalian = ""
                }

                console.log(kembalian);
                if(!isNaN(kembalian)){

                    jQuery("#kembalian").val(kembalian);
                }
            });
        });
    </script>
</body>
</html>
