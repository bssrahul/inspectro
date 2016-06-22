<?php namespace Pingpong\Admin\Validation\Subcategory;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

    public function rules()
    {
        return [
		    'category_id' => 'required',
            'title' => 'required',
            'description' => 'required:categories'
        ];
    }
}
