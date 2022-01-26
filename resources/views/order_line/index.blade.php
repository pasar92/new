@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Reservation index </h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered table-responsive-lg container">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>e-mail</th>
            <th>Date</th>
            <th>Number of persons</th>
            <th>Create date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($reservations as $reservation)
        <tr>
          
            
            <td>{{ $reservation->name }}</td>
            <td>{{ $reservation->phone }}</td>
            <td>{{ $reservation->e_mail }}</td>
            <td>{{ date('d-M-y', strtotime($reservation->create)) }}</td>
            <td>{{ $reservation->number_of_persons }}</td>
            <td>{{ date_format($reservation->created_at, 'j M Y')}}</td>
            <td>
                <form action="{{ route('reservation.destroy',$reservation->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('reservation.show',$reservation->id) }}">Show
                      <i class ="fas fa-eye text-success fa-lg"></i>
                    </a>

    
                   <a class="btn btn-success" href="{{ route('reservation.create') }}">Create New 
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