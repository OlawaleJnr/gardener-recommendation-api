<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignCustomerGardenerResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->customer->id,
      'name' => $this->customer->name,
      'email' => $this->customer->email,
      'assigned' => [
        'to' => [
          'name' => $this->gardener ? $this->gardener->name : null,
          'email' => $this->gardener ? $this->gardener->email : null,
          'state' => $this->gardener ? $this->gardener->state : null,
          'city' => $this->gardener ? $this->gardener->city : null,
          'role' => 'Gardener'
        ]
      ],
      'country' => [
        'name' => $this->customer->country->name,
        'code' => $this->customer->country->code,
        'phoneCode' => $this->customer->country->phoneCode
      ],
      'state' => $this->customer->state,
      'city' => $this->customer->city
      ];
  }
}
