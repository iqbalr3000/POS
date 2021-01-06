<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS | Distributor</title>
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
                <img src="dist/img/Avatar.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">POS</span>
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
                            <li class="breadcrumb-item active">Distributor</li>
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
                                    <h3 class="card-title">Add Distributors</h3>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12 margin-tb">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Buat distributor baru</a>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Disributor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('distributors.store') }}" method="POST">
                                                    @csrf
                                                
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Distributor Name:</strong>
                                                                <input type="text" class="form-control" name="nama_distributor" placeholder="Input distributor name">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Address:</strong>
                                                                <textarea type="text" class="form-control" name="alamat" placeholder="Input address"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>No Telepon:</strong>
                                                                <input type="text" class="form-control" name="no_telp" placeholder="Input no telepon">
                                                            </div>
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
                    
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Distributor</th>
                                                <th>Nama Distributor</th>
                                                <th>Alamat</th>
                                                <th>No. Telepon</th>
                                                <th width="120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($distributors as $distributor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $distributor->id }}</td>
                                                <td>{{ $distributor->nama_distributor }}</td>
                                                <td>{{ $distributor->alamat }}</td>
                                                <td>{{ $distributor->no_telp }}</td>
                                                <td>
                                                    <form action="{{ route('distributors.destroy',$distributor->id) }}" method="POST">
                                                        
                                                        <a class="btn btn-primary" href="{{ route('distributors.edit',$distributor->id) }}">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                            </svg>
                                                        </a>
                                    
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
                                    </table>
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
</body>
</html>
