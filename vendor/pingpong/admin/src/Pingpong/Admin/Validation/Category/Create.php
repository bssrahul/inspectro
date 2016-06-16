<?php namespace Pingpong\Admin\Validation\Category;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|unique:categories',
        ];
    }
}
