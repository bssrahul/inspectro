<?php

namespace Pingpong\Admin\Repositories\Blocks;

use Pingpong\Admin\Entities\Block;

class EloquentBlockRepository implements BlockRepository
{
    public function perPage()
    {
        return config('admin.block.perpage');
    }

    public function getModel()
    {
        $model = config('admin.block.model');
        
        return new $model;
    }

    public function allOrSearch($searchQuery = null,$serviceid = null)
    {
		
        if (is_null($searchQuery)) {
            return $this->getAll($serviceid);
        }
        return $this->search($searchQuery, $serviceid);
    }

	
    public function getAll($serviceid = null)
    {
		
		
        if(!empty($serviceid)){
				return $this->getModel()->where('service_id','=',$serviceid)->latest()->paginate($this->perPage());
		}else{
				return $this->getModel()->latest()->paginate($this->perPage());
		}
    }

    public function search($searchQuery = null,$serviceid = null )
    {
        $search = "%{$searchQuery}%";
		
        return $this->getModel()->where('title', 'like', $search)
            ->orWhere('title', 'like', $search)
			->orWhere('service_id', '=', $serviceid)
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
