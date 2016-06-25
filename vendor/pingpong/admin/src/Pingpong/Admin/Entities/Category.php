<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Category extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['title','description','parent_id','type', 'sorting_key'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /*  public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Article');
    }
 */
    /**
     * @param $query
     * @return mixed
     */
	 public function category()
	{
		return $this->belongsTo('option_types');
	}
	
    /* public function scopeOptions($query)
    {
        return $query->lists('name', 'id');
    } */
}
