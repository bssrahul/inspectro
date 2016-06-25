<?php

namespace Pingpong\Admin\Repositories\Answers;

use Pingpong\Admin\Entities\Answer;

class EloquentAnswerRepository implements AnswerRepository
{
    public function perPage()
    {
        return config('admin.answer.perpage');
    }

    public function getModel()
    {
        $model = config('admin.answer.model');
        
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
		
		if(strval($pId) == 'service'){
			//echo "df" ;die;
			 return $this->getModel()->latest()->paginate($this->perPage());
		}else{
			//print_r($pId);die;
			return $this->getModel()->latest()->paginate($this->perPage());
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
