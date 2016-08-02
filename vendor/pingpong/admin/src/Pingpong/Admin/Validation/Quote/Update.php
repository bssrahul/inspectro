<?php namespace Pingpong\Admin\Validation\Quote;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

   public function rules()
    {
        return [
			'full_name' => 'required|min:3',
			'zipcode' => 'required|numeric|digits_between:5,5',
            'email' => 'required|email' ,
           	'phone_no'=>'numeric|digits_between:10,10',
			
        ];
    }
	 public function messages()
    {
         return [
            'full_name.required' => 'This field is required',
           
            'full_name.min' => 'This field Should have minimum 3 Character  ',
            'zipcode.digits_between' => 'This field Should have  5 Number  ',
			 'phone_no.numeric' => 'This field Should be Numeric only ',
            'phone_no.digits_between' => 'This field Should have  10 Number  ',
           
           
            'zipcode.numeric' => 'This field Should be Numeric only ',
			'zipcode.required' => 'This field is required',
            'email.required' => 'This field is required'
            
        ];
    }
	
	
}
