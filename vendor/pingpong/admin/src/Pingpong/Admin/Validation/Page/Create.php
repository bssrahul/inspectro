<?php namespace Pingpong\Admin\Validation\Page;

use Pingpong\Admin\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'page_title' => 'required',
			'page_heading' => 'required|not_in:0',
            'page_link' => 'required',
            'page_content' => 'required' ,
            'bannar_image' => 'required |mimes:jpeg,jpg,png,gif '
        ];
    }
	
	public function messages()
    {
        return [
			'page_title.required' => 'This field is required',
			'page_heading.required' => 'This field is required',
            'page_link.required' => 'This field is required' ,
			'page_content.required' => 'This field is required',
            'bannar_image.required' => 'This field is required' ,
            'bannar_image.mimes' => 'Please Select Image Format as jpeg , jpg , png ,gif only' 
        ];
    }
}
