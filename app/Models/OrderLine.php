<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
  use HasFactory;


  protected $fillable = [
    'order_id',
    'amount',
    'product_name',
    'price',
  ];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
}
