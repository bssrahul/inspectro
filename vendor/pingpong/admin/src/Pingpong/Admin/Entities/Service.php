<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Service extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['title','description','parent_id', 'sort', 'status'];

    /**
     * @param $query
     * @return mixed
     */
	 public function service()
	{
		return $this->belongsTo('form_types');
	}
	
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
