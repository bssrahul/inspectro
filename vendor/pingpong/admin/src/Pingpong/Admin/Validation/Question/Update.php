<?php namespace Pingpong\Admin\Validation\Question;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

   public function rules()
    {
        return [
            'title' => 'required',
			'service_id' => 'required|not_in:0',
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
