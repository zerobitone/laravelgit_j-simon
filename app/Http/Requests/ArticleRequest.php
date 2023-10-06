<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // uebung 25
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // uebung 25
        return [
            'title' => [ 
				'required',
				function($attribute, $value, $fail) {
					if (strpos($value,'Laravel') === false) {
						$fail($attribute.' enthält nicht den Text Laravel');
					}
				}
			],
			'text' => 'required'
            //
        ];
    }
}
