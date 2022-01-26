@extends('layouts.app')


@section('content')
<div class="row container" >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Dinner table</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dinner_table.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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
   
<form action="{{ route('dinner_table.store') }}" method="POST" class="container">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number:</strong>
                <input type="number" name="number" class="form-control" placeholder="Enter number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number of persons:</strong>
                <input type="number" name="number_of_persons" class="form-control" placeholder="Enter number of persons">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" placeholder="Enter description">
            </div>
        </div>
        

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

