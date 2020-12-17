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

    {{-- data table --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


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
                        <a class="nav-link" href="/dashboard_manager">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/reportsTransaction">Laporan Transaksi <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reportsItem">Laporan Barang</a>
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
                <h1 class="mt-4">Laporan</h1>
                <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Laporan</li>
                    <li class="breadcrumb-item active">Laporan Transaksi</li>
                </ol>

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
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>No</th>        
                            <th>ID Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Nama Kasir</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                            <th>Tanggal Beli</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($transaction as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td>{{ $item->user->id_user }}</td>
                            <td>{{ $item->jumlah_beli }}</td>
                            <td>Rp. {{ $item->total_harga }}</td>
                            <td>{{ $item->tanggal_beli }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>

            </main>
        </div>
    </div>
</body>
</html>