<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request {

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
			// validation rules
            'name' => 'required'
		];
	}

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please provide the category name'
        ];

    }

}
