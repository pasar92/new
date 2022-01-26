<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'dinner_table_id', 'open'
  ];

  public function dinner_table()
  {
    return $this->belongsTo(DinnerTable::class);
  }

  public function order_line()
  {
    return $this->hasMany(OrderLine::class);
  }


  public function scopeFirstOpen($query)
  {
    $query->where('open', 1)->first();
  }
}
