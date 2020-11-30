@extends('layouts.app')
 
@section('content')
        <h1 class="mt-4">Distributor</h1>
        <br>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Distributor</li>
            <li class="breadcrumb-item active">Buat Distributor</li>
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
        
        <form action="{{ route('distributors.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name Distributor:</strong>
                        <input type="text" name="nama_distributor" class="form-control" placeholder="Masukan nama distributor">
                    </div>
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <textarea type="text" name="alamat" class="form-control" placeholder="Masukan alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <strong>No Telepon:</strong>
                        <input type="text" name="no_telp" class="form-control" placeholder="Masukan no telepon">
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('distributors.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>
      
@endsection
