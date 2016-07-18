<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Answer extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['question_id','answers','custom_answer','sort','next_question_id','option_description','short_name'];

    /**
     * @param $query
     * @return mixed
     */
	public function question()
    {
        return $this->belongsTo(__NAMESPACE__ . '\\Question','question_id','id');
    }
	public function nextQuestion()
    {
        return $this->belongsTo(__NAMESPACE__ . '\\Question','next_question_id','id');
    }
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
