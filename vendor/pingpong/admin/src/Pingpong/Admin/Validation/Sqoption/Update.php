<?php namespace Pingpong\Admin\Validation\Category;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

    public function rules()
    {
        return [
            'service_question_id' => 'required|unique:sqoptions',
            'option_type' => 'required',
            'end_pages' => 'required',
            'options' => 'required',
        ];
    }
}
