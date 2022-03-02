<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('email', 50)->unique();
      $table->unsignedBigInteger('country_id');
      $table->foreign('country_id')->references('id')->on('countries');
      $table->string('state', 50);
      $table->string('city', 30);
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
    Schema::dropIfExists('customers');
  }
}
