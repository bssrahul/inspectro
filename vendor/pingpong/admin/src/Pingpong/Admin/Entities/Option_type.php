<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class option_types extends Model
{

	 protected $table = 'option_types';
    /**
     * @var array
     */
    protected $fillable = ['id', 'op_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /*  public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\\Article');
    } */

	public function sqoption()
    {
        return $this->hasMany('App\Models\sqoption');
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
