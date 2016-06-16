<?php namespace Pingpong\Admin\Validation\Category;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required:categories'
        ];
    }
}
