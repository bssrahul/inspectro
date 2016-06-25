<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Sqoption extends Model
{

	 protected $table = 'sqoptions';
    /**
     * @var array
     */
    protected $fillable = ['service_question_id', 'option_type','inputbox','options'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /*  public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Article');
    } */

	public function question()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Category','id','service_question_id');
    }
	

    /**
     * @param $query
     * @return mixed
     */
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
