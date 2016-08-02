<?php

namespace Pingpong\Admin\Repositories\Questions;

use Pingpong\Admin\Entities\Question;

class EloquentQuestionRepository implements QuestionRepository
{
    public function perPage()
    {
        return config('admin.question.perpage');
    }

    public function getModel()
    {
        $model = config('admin.question.model');
        
        return new $model;
    }
	 /* public function getMod()
    {
        $mod = config('admin.answer.model');
        
        return new $mod;
    } */

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
	
	
	public function getQueAnswers($serviceid = null)
    {
		
		
        if(!empty($serviceid)){
				return $this->getModel()->where('service_id','=',$serviceid)->where('response_time_question',1)->with('answers')->get();
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
	/* public function update1(array $data)
    {
        return DB :: table('answer')->update($data);
    } */
}
