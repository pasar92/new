<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinnerTable extends Model
{
  use HasFactory;

  protected $fillable = [
    'number', 'number_of_persons', 'description'
  ];

  public function order()
  {
    return $this->hasMany(Order::class);
  }
}
