<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gardener extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'email', 'country_id', 'state', 'city'
  ];

  // This belongs to a Country
  public function country()
  {
    return $this->belongsTo(Country::class);
  }
}
