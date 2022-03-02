<?php

namespace Database\Seeders;

use App\Models\Gardener;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GardenerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get("database/gardener.json");
    $gardeners = json_decode($json);

    foreach ($gardeners as $key => $gardener) {
      Gardener::create([
        "name" => $gardener->name,
        "email" => $gardener->email,
        "country_id" => $gardener->country_id,
        "state" => $gardener->state,
        "city" => $gardener->city
      ]);
    }
  }
}
