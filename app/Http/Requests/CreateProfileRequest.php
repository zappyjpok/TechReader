<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProfileRequest extends Request {

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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required'
		];
	}

    public function messages()
    {
        return [
            'first_name.required' => 'Please provide your first name',
            'last_name.required' => 'Please provide your last name',
            'phone.required' => 'Please provide your phone number'
        ];

    }

}
