<?php namespace Pingpong\Admin\Validation\Quote;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
			'message' => 'required',
           	'email' => 'required',
			
        ];
    }
	
	public function messages()
    {
        return [
            'message.required' => 'This field is required',
            'email.required' => 'This field is required',
           
        ];
    }
}
