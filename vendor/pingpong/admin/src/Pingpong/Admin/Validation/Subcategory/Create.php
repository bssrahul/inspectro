<?php namespace Pingpong\Admin\Validation\Subcategory;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'category_id' => 'required',
			'title' => 'required',
            'description' => 'required|unique:categories',
        ];
    }
}
