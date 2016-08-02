<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Question extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['title','form_type_id','service_id','description_1','description_2','other_custom_field','sort_que','short_name','response_time_question'];

    /**
     * @param $query
     * @return mixed
     */
	public function answers()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Answer','question_id','id');
    }
	
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
