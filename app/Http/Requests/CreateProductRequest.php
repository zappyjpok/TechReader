<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request {

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
            'proName' => 'required',
            'proAuthor' => 'required',
            'proTitle' => 'required',
            'proPublishDate' => 'required|date',
            'proPublisher' => 'required',
            'proPrice' => 'required|regex:/^[0-9]+(\.[0-9]{2})?$/',
            'proCategoryId' => 'required',
            'proDescription' => 'required'

		];
	}
    public function messages()
    {
        return [
            'proName.required' => 'Please provide the product name',
            'proAuthor.required' => 'Please provide the author\'s name',
            'proTitle.required' => 'Please provide the book title',
            'proPublishDate.required' => 'Please provide the publish date',
            'proPublishDate.date' => 'The publish date you entered is not a valid date',
            'proPublisher.required' => 'Please provide the publisher',
            'proPrice.required' => 'Please provide a price',
            'proPrice.regex' => 'The price you entered is not a valid price',
            'proCategoryId.required' => 'Please select a category',
            'proDescription.required' => 'Please provide a description of the book'
        ];

    }

}
