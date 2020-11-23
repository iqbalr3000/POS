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
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reportsTransaction">Laporan Transaksi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/reportsItem">Laporan Barang <span class="sr-only">(current)</span></a>
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
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Laporan</li>
                    <li class="breadcrumb-item active">Laporan Barang</li>
                </ol>
                <br>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                        <form action="/laporan/search" method="GET">
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
                            </div>
                    </div>
                </div>
                <hr>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
            <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th>No</th>        
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Harga Barang</th>
                    <th>Stok Barang</th>
                    <th>Nama Merek</th>
                    <th>Nama Distributor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->harga_barang }}</td>
                    <td>{{ $item->stok_barang }}</td>
                    <td>{{ $item->merek->nama_merek }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <script>
            function.print(){
                window.print();
            }
         </script>
            </main>
        </div>
    </div>
</body>
</html>