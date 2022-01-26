<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('reservation.index', ['reservations' => Reservation::all()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('reservation.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'phone' => 'required',
      'e_mail' => 'required',
      'create' => 'required',
      'number_of_persons' => 'required'
    ]);
    Reservation::create($request->all());

    return redirect()->route('reservation.index')
      ->with('success', 'Reservation created successfully!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function show(reservation $reservation)
  {
    return view('reservation.show', compact('reservation'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function edit(reservation $reservation)
  {
    return view('reservation.edit', compact('reservation'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, reservation $reservation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function destroy(reservation $reservation)
  {
    $reservation->delete();
    return redirect()->route('reservation.index')
      ->with('success', 'Reservation deleted successfully');
  }
}
