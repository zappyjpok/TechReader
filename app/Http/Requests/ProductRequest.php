<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			//
            'name' => 'required',
            'author' => 'required',
            'title' => 'required',
            'publish_date' => 'required|date',
            'publisher' => 'required',
            'price' => 'required|regex:/[\d]{2},[\d]{2}/',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required'
		];
	}

}
