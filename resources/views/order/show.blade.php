@extends('layouts.app')
  
@section('content')
    <div class="row container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show order</h2>
            </div>
            
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('dinner_table.index') }}"> Back to tables</a>
                      <i clas="fas fa-edit fa-lg"></i>
                    </a> 
   
        <a class="btn btn-primary" href="{{ route('order.order_line.create', ['order' => $order->id]) }}"> Add order item</a>
        @isset($order->order_line)

    <table class="table table-bordered table-responsive-lg container">
        <tr>
            <th>Amount</th>
            <th>Product name</th>
            <th>Price</th>
        </tr>
        @foreach ($order->order_line as $order_line)
        <tr>
            <td>{{$order_line->amount}}</td>
            <td>{{$order_line->product_name}}</td>
            <td>{{ $order_line->amount * $order_line->price}}</td>
        </tr>
            <td>

              {{--  <form action="{{ route('product.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('order.show',$product->id) }}">Show
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
        </tr> --}}
        @endforeach
        @endisset
    </table>


    <div class="row container" >
    <div class="col-lg-6 margin-tb">
            <h6>Total</h6>
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('order.show', ['order' => $order->id]) }}"> Back</a>
        </div>
    </div>
</div>


      <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" value='0' name="open">
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-danger">Sluit order</button>

          
  </form>
  @foreach ($order->order_line as $order_line)
          <div> {{$order_line->price += $order_line->price}}</div>

      </div>
      @endforeach

@endsection