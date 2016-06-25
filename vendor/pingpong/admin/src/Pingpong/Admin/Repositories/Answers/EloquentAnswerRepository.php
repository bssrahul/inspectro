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

    public function allOrSearch($searchQuery = null,$qid = null)
    {
		
        if (is_null($searchQuery)) {
            return $this->getAll($qid);
        }
        return $this->search($searchQuery, $qid);
    }

	
    public function getAll($qid = null)
    {
		
		if(!empty($qid)){
				return $this->getModel()->where('question_id','=',$qid)->latest()->with('question','nextQuestion')->paginate($this->perPage());
		}else{
				return $this->getModel()->latest()->with('question','nextQuestion')->paginate($this->perPage());
		}
			
			
		
        
    }

    public function search($searchQuery = null,$qid = null )
    {
        $search = "%{$searchQuery}%";
		
        return $this->getModel()->with('question','nextQuestion')->where('title', 'like', $search)
            ->orWhere('title', 'like', $search)
			->orWhere('parent_id', '=', $qid)
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
