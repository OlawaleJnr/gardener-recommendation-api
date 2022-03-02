<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignCustomerGardenersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('assign_customer_gardeners', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('customers');
      $table->unsignedBigInteger('gardener_id');
      $table->foreign('gardener_id')->references('id')->on('gardeners');
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
    Schema::dropIfExists('assign_customer_gardeners');
  }
}
