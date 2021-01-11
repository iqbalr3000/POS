<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS | Items</title>
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
                            <a href="dashboard_admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="brands" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="distributors" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Distributor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="items" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Item</p>
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
                            <li class="breadcrumb-item active">Item</li>
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
                                    <h3 class="card-title">Edit Items</h3>
                                </div>

                                <div class="card-body">

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
                                
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name Barang:</strong>
                                                <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="form-control" placeholder="Masukan nama barang">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <strong>ID Merek:</strong>
                                                        <select class="form-control" name="id_merek">
                                                            <option value=''>Pilih ID Merek</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"@if($brand->id == $item->id_merek) selected @endif>
                                                                    {{ $brand->nama_merek }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <strong>ID Distirbutor:</strong>
                                                        <select class="form-control" name="id_distributor">
                                                            <option value=''>Pilih ID Distributor</option>
                                                            @foreach ($distributors as $distributor)
                                                                <option value="{{ $distributor->id }}"@if($distributor->id == $item->id_distributor)selected @endif>
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
                                                    <input type="date" name="tanggal_masuk" value="{{ $item->tanggal_masuk }}" class="form-control" placeholder="Masukan tanggal masuk">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md">
                                                        <strong>Harga Beli:</strong>
                                                    <input type="text" name="harga_beli" value="{{ $item->harga_beli }}" class="form-control" placeholder="Masukan harga beli barang">
                                                    </div>
                                                    <div class="form-group col-md">
                                                        <strong>Harga Jual:</strong>
                                                    <input type="text" name="harga_jual" value="{{ $item->harga_jual }}" class="form-control" placeholder="Masukan harga jual barang">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Stok Barang:</strong>
                                                    <input type="text" name="stok_barang" value="{{ $item->stok_barang }}" class="form-control" placeholder="Masukan stok barang">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Keterangan:</strong>
                                                    <textarea type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">{{ $item->keterangan }}</textarea>
                                                </div>
                                            </div>
                            
                                            <br>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <a class="btn btn-secondary" href="{{ route('items.index') }}"> Back</a>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                
                                    </form>
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

    
</body>
</html>
