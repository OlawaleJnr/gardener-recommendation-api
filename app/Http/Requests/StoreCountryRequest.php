<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => [
        'required',
        'string',
        'max:30'
      ],
      'code' => [
        'required',
        'string',
        'min:1',
        'max:2'
      ],
      'phoneCode' => [
        'required',
        'integer',
        'min:1',
        'max:3'
      ]
    ];
  }
}
