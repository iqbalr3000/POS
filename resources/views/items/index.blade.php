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
                        <a class="nav-link" href="/brands">Merek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/distributors">Distributor</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/items">Barang <span class="sr-only">(current)</span></a>
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
                <h1 class="mt-4">Barang</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Barang</li>
                </ol>

                <br>
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('items.create') }}"> Buat barang baru</a>
                        </div>
                        <br>
                    </div>
                </div>
            
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-striped" id="datatable-crud">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>ID Merek</th>
                            <th>ID Distributor</th>
                            <th>Tanggal Masuk</th>
                            <th>Harga Barang</th>
                            <th>Stok Barang</th>
                            <th>Keterangan</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>         
                </table>

                <script type="text/javascript">
                    $(document).ready( function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('#datatable-crud').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ url('items') }}",
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'nama_barang', name: 'nama_barang' },
                                { data: 'id_merek', name: 'id_merek' },
                                { data: 'id_distributor', name: 'id_distributor' },
                                { data: 'tanggal_masuk', name: 'tanggal_masuk' },
                                { data: 'harga_barang', name: 'harga_barang' },
                                { data: 'stok_barang', name: 'stok_barang' },
                                { data: 'keterangan', name: 'keterangan' },
                                {data: 'action', name: 'action', orderable: false},
                            ],
                        });

                        $('body').on('click', '.delete', function () {
                            if (confirm("Delete Record?") == true) {
                                var id = $(this).data('id');
                                // ajax
                                $.ajax({
                                    type:"POST",
                                    url: "{{ url('items') }}",
                                    data: { id: id},
                                    dataType: 'json',
                                    success: function(res){
                                        var oTable = $('#datatable-crud').dataTable();
                                        oTable.fnDraw(false);
                                    }
                                });
                            }
                        });
                    });
                </script>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
                <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
                
            </main>
        </div>
    </div>
</body>
</html>