<?php

namespace Pingpong\Admin\Repositories\Subcategories;

use Pingpong\Admin\Entities\Subcategory;

class EloquentSubcategoryRepository implements SubcategoryRepository
{
    public function perPage()
    {
        return config('admin.subcategory.perpage');
    }

    public function getModel()
    {
        $model = config('admin.subcategory.model');
        
        return new $model;
    }

    public function allOrSearch($searchQuery = null)
    {
        if (is_null($searchQuery)) {
            return $this->getAll();
        }

        return $this->search($searchQuery);
    }

    public function getAll()
    {
        return $this->getModel()->latest()->paginate($this->perPage());
    }
	
    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getModel()->where('title', 'like', $search)
            ->orWhere('title', 'like', $search)
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
