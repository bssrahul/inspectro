<?php namespace Pingpong\Admin\Entities;

use Pingpong\Presenters\Model;

class Subcategory extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['category_id','title','description'];

    
}
