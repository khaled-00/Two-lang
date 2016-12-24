<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request {

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
			'article_id' 		=> 'required',
			'image' 			=> 'required|mimes:jpeg,bmp,png',
			'en_title' 			=> 'required|min:2',
			'ar_title' 			=> 'required|min:2',
			'en_description' 	=> 'required|min:10',
			'ar_description' 	=> 'required|min:10',
		];
	}

}
