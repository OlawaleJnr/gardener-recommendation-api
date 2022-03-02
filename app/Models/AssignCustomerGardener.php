<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCustomerGardener extends Model
{
  use HasFactory;

  protected $fillable = [
    'customer_id', 'gardener_id'
  ];

  // This belongs to Customer Model
  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  // This belongs to Gardener Model
  public function gardener()
  {
    return $this->belongsTo(Gardener::class);
  }
}
