<?php namespace Pingpong\Admin\Validation\Block;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

 public function rules()
    {
        return [
		
			'type'=> 'required',
			'title'=> 'required',
			'description'=> 'required',
			'long_description'=> 'required',
			'image'=> 'mimes:jpeg,jpg,png,gif',
			
            
        ];
    }
	
	public function messages()
    {
        return [
			'type.required' => 'This field is required',
			'title.required' => 'This field is required',
		    'description.required' => 'This field is required' ,
			'long_description.required' => 'This field is required',
			//'name.required' => 'This field is required' ,
			//'location.required' => 'This field is required',
            'image.mimes' => 'Please Select Image Format as jpeg , jpg , png ,gif only' 
        ];
    }
	
}
