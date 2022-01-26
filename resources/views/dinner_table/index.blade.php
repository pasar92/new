@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="row">
        <div class="col"><h1>Alle tafels</h1></div>
        <div class="col  d-flex justify-content-end">
            <a class=' align-self-end btn btn-primary' href={{route('dinner_table.create')}}>Maak een nieuw dinner_table</a>
        </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">number</th>
                    <th scope="col">number_of_persons</th>
                    <th scope="col">description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
        <tbody>
        @foreach ($dinner_tables as $dinner_table)

        <tr>
            <th>{{$dinner_table->number}}</th>
            <th>{{$dinner_table->number_of_persons}}</th>
            <td>{{$dinner_table->description}}</td>
            <td>

                @if($dinner_table->order->where('open', 1)->first() != null)
                    <a class="btn btn-primary" href="{{ route('order.show', ['order' => $dinner_table->order->where('open', 1)->first()->id]) }}"> Edit order</a>
                @else
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value={{$dinner_table->id}} name="dinner_table_id">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Maak nieuwe order
                            </button>
                        </div>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

  
@endsection