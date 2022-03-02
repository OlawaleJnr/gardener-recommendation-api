<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'country' => [
        'name' => $this->country->name,
        'code' => $this->country->code,
        'phoneCode' => $this->country->phoneCode
      ],
      // 'assigned' => [
      //     'gardener' => [
      //       'name' => $this->gardener ? $this->gardener->name : null,
      //       'email' => $this->gardener ? $this->gardener->email : null,
      //       'state' => $this->gardener ? $this->gardener->state : null,
      //       'city' => $this->gardener ? $this->gardener->city : null,
      //     ]
      //   ],
      'state' => $this->state,
      'city' => $this->city
    ];
  }
}
