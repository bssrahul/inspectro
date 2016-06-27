<?php namespace Pingpong\Admin\Validation\Answer;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

   public function rules()
    {
        return [
			'question_id' => 'required|not_in:0',
           	
			
        ];
    }
	
	
	
}
