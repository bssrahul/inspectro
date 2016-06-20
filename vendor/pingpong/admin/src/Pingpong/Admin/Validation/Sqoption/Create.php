<?php namespace Pingpong\Admin\Validation\Sqoption;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
				'service_question_id' => 'required',
				'option_type' => 'required'
				
               ];
    }
}
