<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'code', 'phoneCode'
  ];

  public function getRouteKeyName()
  {
    return 'code';
  }

  // This has many Gardeners
  public function gardener()
  {
    return $this->hasMany(Gardener::class);
  }

  // This has many Customers
  public function customer() {
    return $this->hasMany(Customer::class);
  }
}
