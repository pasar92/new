<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Order $order)
  {
    return view('order_line.index')->with('order', $order);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Order $order)
  {
    $products = Product::all(['id', 'name']);
    return view('order_line.create')
      ->with('order', $order)
      ->with('products', $products);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $order)
  {
    $request->validate([
      'amount' => 'required',
      'product_id' => 'required',
    ]);
    $product = Product::find($request->product_id);

    $request->request->set('order_id', $order);
    $request->request->set('product_name', $product->name);
    $request->request->set('price', $product->price);

    OrderLine::create($request->all());

    return redirect()->route('order.show', ['order' => $order]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\OrderLine  $orderLine
   * @return \Illuminate\Http\Response
   */
  public function show(OrderLine $orderLine)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\OrderLine  $orderLine
   * @return \Illuminate\Http\Response
   */
  public function edit(OrderLine $orderLine)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\OrderLine  $orderLine
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, OrderLine $orderLine)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\OrderLine  $orderLine
   * @return \Illuminate\Http\Response
   */
  public function destroy(OrderLine $orderLine)
  {
    //
  }
}
