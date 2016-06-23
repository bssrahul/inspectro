<?php

namespace Pingpong\Admin\Repositories\Categories;

use Pingpong\Admin\Entities\Category;

class EloquentCategoryRepository implements CategoryRepository
{
    public function perPage()
    {
        return config('admin.category.perpage');
    }

    public function getModel()
    {
        $model = config('admin.category.model');
        
        return new $model;
    }

    public function allOrSearch($searchQuery = null,$pId = null)
    {
		if(is_null($pId)){
			$pId = 0;
		}
		
        if (is_null($searchQuery)) {
            return $this->getAll($pId);
        }
        return $this->search($searchQuery, $pId);
    }

	
    public function getAll($pId = null)
    {
		if($pId == 'service'){
			 return $this->getModel()->where('type','=',$pId)->latest()->paginate($this->perPage());
		}else{
			return $this->getModel()->where('parent_id','=',$pId)->latest()->paginate($this->perPage());
		}
        
    }

    public function search($searchQuery = null,$pId = null )
    {
        $search = "%{$searchQuery}%";
		
        return $this->getModel()->where('title', 'like', $search)
            ->orWhere('title', 'like', $search)
			->orWhere('parent_id', '=', $pId)
            ->paginate($this->perPage())
        ;
    }

    public function findById($id)
    {
        return $this->getModel()->find($id);
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getModel()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function delete($id)
    {
        $article = $this->findById($id);

        if (!is_null($article)) {
            $article->delete();
            return true;
        }

        return false;
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }
}
