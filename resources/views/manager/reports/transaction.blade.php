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
                            <a href="dashboard_manager" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reportsTransaction" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Laporan Transaksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reportsItem" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Laporan Barang</p>
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
                            <li class="breadcrumb-item active">Transaction Report</li>
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
                                    <h3 class="card-title">Transactions Report</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <form action="/laporan/cari" method="GET">
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <input type="date" class="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                                                    @error('starDate')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-auto">
                                                    <label class="col-sm-2 mb-3"><b>-</b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="date" class="form-control @error('endDate') is-invalid @enderror mb-3" name="endDate" id="endDate">
                                                    @error('endDate')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary mb-3">Cari</button>
                                                    <div class="btn btn-primary mb-3" onclick="print()" id="print">Print</div>
                                                    <a href="/reports/export_excel/transaction" class="btn btn-primary mb-3" target="_blank">Export Excel</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    </form>

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>        
                                                <th>ID User</th>
                                                <th>Total Belanja</th>
                                                <th>Bayar</th>
                                                <th>Kembalian</th>
                                                <th>Tanggal Beli</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            @foreach ($transaction as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->total_bayar }}</td>
                                                <td>{{ $item->uang_bayar }}</td>
                                                <td>{{ $item->kembalian }}</td>
                                                <td>{{ $item->tanggal_beli }}</td>
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

    <script>
        function.print(){
            window.print();
        }
    </script>

</body>
</html>
