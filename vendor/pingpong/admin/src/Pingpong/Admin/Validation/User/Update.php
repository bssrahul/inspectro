<?php namespace Pingpong\Admin\Validation\User;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

    public function rules()
    {
        $id = Request::segment(3);

        $rules = [
            'fname' => 'required|alpha|min:3',
			'lname' => 'required|alpha|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
        ];

        if ($this->has('password')) {
            $rules['password'] = 'required|min:6|max:20';
        }

        return $rules;
    }
	    public function messages()
    {
        $current_year = date('Y');
        return [
            'fname.required' => 'This field is required',
            'fname.alpha' => 'This field Should be Character only ',
            'fname.min' => 'This field Should have minimum 3 Character  ',
            'lname.min' => 'This field Should have minimum 3 Character  ',
            'lname.alpha' => 'This field Should be Character only ',
			'lname.required' => 'This field is required',
            'email.required' => 'This field is required'
            
        ];
    }
}

