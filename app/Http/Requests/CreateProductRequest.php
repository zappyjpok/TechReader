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
            'name' => 'required',
            'author' => 'required',
            'title' => 'required',
            'publish_date' => 'required|date',
            'publisher' => 'required',
            'price' => 'required|regex:/^[0-9]+(\.[0-9]{2})?$/',
            'category_id' => 'required',
            'description' => 'required'

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
            'name.required' => 'Please provide the product name',
            'author.required' => 'Please provide the author\'s name',
            'title.required' => 'Please provide the book title',
            'publish_date.required' => 'Please provide the publish date',
            'publish_date.date' => 'The publish date you entered is not a valid date',
            'publisher.required' => 'Please provide the publisher',
            'price.required' => 'Please provide a price',
            'price.regex' => 'The price you entered is not a valid price',
            'category_id.required' => 'Please select a category',
            'description.required' => 'Please provide a description of the book'
        ];

    }

}
