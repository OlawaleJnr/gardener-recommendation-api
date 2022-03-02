<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get("database/country.json");
    $countries = json_decode($json);

    foreach ($countries as $key => $country) {
      Country::create([
        "name" => $country->name,
        "code" => $country->code,
        "phoneCode" => $country->phoneCode
      ]);
    }
  }
}
