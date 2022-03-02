<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
        'string',
        'max:30',
        'unique:countries,name,'.$this->country->id.''
      ],
      'code' => [
        'string',
        'min:1',
        'max:2',
        'unique:countries,code,'.$this->country->id.''
      ],
      'phoneCode' => [
        'integer',
        'min:1',
        'max:3',
        'unique:countries,phoneCode,'.$this->country->id.''
      ]
    ];
  }
}
