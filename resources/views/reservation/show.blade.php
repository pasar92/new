@extends('layouts.app')
  
@section('content')
    <div class="row container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reservation.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $reservation->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $reservation->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ $reservation->e_mail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number of persons:</strong>
                {{ $reservation->number_of_persons }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
        {{ date('d-M-y', strtotime($reservation->create)) }}
            </div>
        </div>
        
    </div>
@endsection