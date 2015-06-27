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
            'proName' => 'required',
            'proAuthor' => 'required',
            'proTitle' => 'required',
            'proPublishDate' => 'required|date',
            'proPublisher' => 'required',
            'proPrice' => 'required|regex:/[\d]{2},[\d]{2}/',
            'proCategoryId' => 'required',
            'proDescription' => 'required',
            'proImagePath' => 'required'
		];
	}

}
