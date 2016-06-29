<?php namespace Pingpong\Admin\Validation\Question;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'title' => 'required',
			
			'form_type_id' => 'required|not_in:0',
            'description_1' => 'required',
            'description_2' => 'required'
        ];
    }
	
	public function messages()
    {
        return [
            'title.required' => 'This field is required',
			'description_1.required' => 'This field is required',
            'description_2.required' => 'This field is required'
        ];
    }
}
