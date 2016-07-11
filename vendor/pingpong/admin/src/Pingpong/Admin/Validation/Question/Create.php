<?php namespace Pingpong\Admin\Validation\Question;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'title' => 'required',
			
			'form_type_id' => 'required|not_in:0',
            
        ];
    }
	
	public function messages()
    {
        return [
            'title.required' => 'This field is required',
			
        ];
    }
}
