<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Pingpong\Admin\Entities\Service;
use Pingpong\Admin\Repositories\Services\ServiceRepository;
use Pingpong\Admin\Validation\Service\Create;
use Pingpong\Admin\Validation\Service\Update;

class ServicesController extends BaseController
{
    protected $repository;

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('Services.index');
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index(Request $request)
    {
			
        $Services = $this->repository->allOrSearch($request->get('q'));
     
        $no = $Services->firstItem();
       //  print_R($no);exit;
        return $this->view('Services.index', compact('Services', 'no'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {

		return $this->view('Services.create');

    } 

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
   public function store(Create $request)
    {  
        $data = $request->all();
	    Services::create($data);
        return $this->redirect('Services.index');
    } 

    /**
     * Display the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $Services = $this->repository->findById($id);
            return $this->view('Services.show', compact('Services'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $Services = $this->repository->findById($id);
            return $this->view('Services.edit', compact('Services'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Update $request, $id)
    {
        try {
            $data = $request->all();

            $Services = $this->repository->findById($id);

            $Services->update($data);

            return $this->redirect('Services.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return $this->redirect('Services.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
