<?php

namespace Pingpong\Admin\Repositories\Quotes;

use Pingpong\Admin\Entities\Quote;

class EloquentQuoteRepository implements QuoteRepository
{
    public function perPage()
    {
        return config('admin.quote.perpage');
    }

    public function getModel()
    {
        $model = config('admin.quote.model');
        
        return new $model;
    }

    public function allOrSearch($searchQuery = null,$request_id = null)
    {
		
        if (is_null($searchQuery)) {
            return $this->getAll($request_id);
        }
        return $this->search($searchQuery, $request_id);
    }

	
    public function getAll($request_id = null)
    {
		
		if(!empty($request_id)){
				return $this->getModel()->where('id','=',$request_id)->latest()->paginate($this->perPage());
		}else{
				return $this->getModel()->latest()->paginate($this->perPage());
		}
			
			
		
        
    }

    public function search($searchQuery = null,$request_id = null )
    {
        $search = "%{$searchQuery}%";
		
        return $this->getModel()->where('title', 'like', $search)
            ->orWhere('title', 'like', $search)
			->orWhere('id', '=', $request_id)
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
