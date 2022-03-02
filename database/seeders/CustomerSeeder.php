<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CustomerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get("database/customer.json");
    $customers = json_decode($json);

    foreach ($customers as $key => $customer) {
      Customer::create([
        "name" => $customer->name,
        "email" => $customer->email,
        "country_id" => $customer->country_id,
        "state" => $customer->state,
        "city" => $customer->city
      ]);
    }
  }
}
