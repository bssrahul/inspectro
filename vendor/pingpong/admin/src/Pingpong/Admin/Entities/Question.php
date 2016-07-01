<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Question extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['title','form_type_id','service_id','description_1','description_2','other_custom_field','sort_question'];

    /**
     * @param $query
     * @return mixed
     */
	
	
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
