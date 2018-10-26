<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedingRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'quantity'    => 'required|numeric',
      'duck_count'  => 'required|integer',
      'location_id' => 'required|exists:locations,id',
      'food_id'     => 'required|exists:foods,id',
     //TODO timestamp validator
      'time' => ''

    ];
  }
}
