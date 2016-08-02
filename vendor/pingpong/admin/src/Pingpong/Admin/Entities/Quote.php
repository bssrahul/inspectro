<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Quote extends Model
{
    
	protected $table = 'quote_requests';
    /**
     * @var array
     */
	 
	//protected $fillable = ['question_id','answers','custom_answer','sort','next_question_id','option_description'];
  
    protected $fillable = ['full_name','contact_mode','zipcode','service_request_date','selected_options','status','phone_no','email'];

    /**
     * @param $query
     * @return mixed
     */
	 public function service()
    {
        return $this->belongsTo(__NAMESPACE__ . '\\Service','service_id','id');
    }
	public function question()
    {
        return $this->belongsTo(__NAMESPACE__ . '\\Question','question_id','id');
    }
	/*
	public function nextQuestion()
    {
        return $this->belongsTo(__NAMESPACE__ . '\\Question','next_question_id','id');
    }  */
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
