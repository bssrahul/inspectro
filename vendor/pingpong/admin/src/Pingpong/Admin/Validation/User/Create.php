<?php namespace Pingpong\Admin\Validation\User;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'fname' => 'required',
			'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
        ];
    }
}
