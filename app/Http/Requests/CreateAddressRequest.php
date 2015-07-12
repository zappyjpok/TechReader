<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAddressRequest extends Request {

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
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postal_code' => 'required'
        ];
	}

    public function messages()
    {
        return [
            'address.required' => 'Please provide your address',
            'state.required' => 'Please provide your state',
            'city.required' => 'Please provide your city',
            'postal_code.required' => 'Please provide your postal code'
        ];

    }

}
