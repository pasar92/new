@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product index </h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" href="{{ route('product.create') }}">Add new product 
                      <i clas="fas fa-edit fa-lg"></i>
                    </a> 
   
    <table class="table table-bordered table-responsive-lg container">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
          
            
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            
            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show
                      <i class ="fas fa-eye text-success fa-lg"></i>
                    </a>

    
                   

                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit 
                      <i clas="fas fa-edit fa-lg"></i>
                    </a> 

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" title="delete" class="btn btn-danger">Delete
                      <i class="fas fa-trash fa-lg text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  

@endsection