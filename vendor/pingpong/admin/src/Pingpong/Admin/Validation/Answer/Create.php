<?php namespace Pingpong\Admin\Validation\Answer;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
           	'question_id' => 'required',
			
        ];
    }
	
	public function messages()
    {
        return [
           
        ];
    }
}
