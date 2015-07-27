<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddToCart extends Request {

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
			// Check if quantity = 0
            'quantity' => 'required|min:1|numeric'
		];
	}

    public function messages()
    {
        return [
            'quantity.min' => 'Please select a quantity',
        ];

    }

}
