@extends('layouts.app')
 
@section('content')
        <h1 class="mt-4">Merek</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Merek</li>
            <li class="breadcrumb-item active">Edit Merek</li>
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
    
        <form action="{{ route('brands.update',$brand->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name Merek:</strong>
                        <input type="text" name="nama_merek" value="{{ $brand->nama_merek }}" class="form-control" placeholder="Masukan nama merek">
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-secondary" href="{{ route('brands.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
      
@endsection