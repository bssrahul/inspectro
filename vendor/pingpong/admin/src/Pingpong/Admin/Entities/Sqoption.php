<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Sqoption extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['service_question_id', 'option_type','end_pages','options'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /*  public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Article');
    } */

    /**
     * @param $query
     * @return mixed
     */
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
