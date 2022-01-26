<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_lines', function (Blueprint $table) {
      $table->id();
      $table->foreignId('order_id')->constrained();
      $table->integer('amount');
      $table->string('product_name');
      $table->decimal('price', 6, 2)->default(0.00)->nullable(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('order_lines');
  }
}
