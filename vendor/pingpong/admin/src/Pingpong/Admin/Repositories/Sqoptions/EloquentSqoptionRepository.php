<?php

namespace Pingpong\Admin\Repositories\Sqoptions;

use Pingpong\Admin\Entities\Sqoption;

class EloquentSqoptionRepository implements SqoptionRepository
{
    public function perPage()
    {
        return config('admin.sqoption.perpage');
    }

    public function getModel()
    {
        $model = config('admin.sqoption.model');
        
        return new $model;
    }

    public function allOrSearch($searchQuery = null,$quesId=null)
    {
        if (is_null($searchQuery)) {
			//  echo '<pre>';print_r($quesId);exit;
            return $this->getAll($quesId);
        }

        return $this->search($searchQuery,$quesId);
    }

    public function getAll($quesId=null)
    {
		if(!empty($quesId)){
				return $this->getModel()->where('service_question_id','=',$quesId)->latest()->with('question')->paginate($this->perPage());
		}else{
			return $this->getModel()->latest()->with('question')->paginate($this->perPage());
		}
        
    }

    public function search($searchQuery,$quesId=null)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getModel()->with('question')->where('name', 'like', $search)
            ->orWhere('slug', 'like', $search)
            ->orWhere('service_question_id', '=', $quesId)
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
