<?php namespace Pingpong\Admin\Validation\Page;

use Pingpong\Admin\Validation\Validator;
use Illuminate\Support\Facades\Request;

class Update extends Validator
{

    public function rules()
    {
        return [
            'page_title' => 'required',
			'page_heading' => 'required|not_in:0',
            'page_link' => 'required',
            'page_content' => 'required' ,
            'bannar_image' => 'mimes:jpeg,jpg,png,gif '
        ];
    }
	
	public function messages()
    {
        return [
			'page_title.required' => 'This field is required',
			'page_heading.required' => 'This field is required',
            'page_link.required' => 'This field is required' ,
			'page_content.required' => 'This field is required',
            'bannar_image.mimes' => 'Please Select Image Format as jpeg , jpg , png ,gif only' 
        ];
    }
	
}
