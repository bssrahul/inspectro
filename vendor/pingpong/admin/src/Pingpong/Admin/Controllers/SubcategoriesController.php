<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Pingpong\Admin\Entities\Subcategory;
use Pingpong\Admin\Repositories\Subcategories\SubcategoryRepository;
use Pingpong\Admin\Validation\Subcategory\Create;
use Pingpong\Admin\Validation\Subcategory\Update;

class SubcategoriesController extends BaseController
{
    protected $repository;

    public function __construct(SubcategoryRepository $repository)
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
        return $this->redirect('subcategories.index');
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index(Request $request)
    {
			
        $subcategories = $this->repository->allOrSearch($request->get('q'));
     
        $no = $subcategories->firstItem();
       //  print_R($no);exit;
        return $this->view('subcategories.index', compact('subcategories', 'no'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {

		return $this->view('subcategories.create');

    } 

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
   public function store(Create $request)
    {  
        $data = $request->all();
	    Subcategory::create($data);
        return $this->redirect('subcategories.index');
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
            $subcategory = $this->repository->findById($id);
            return $this->view('subcategories.show', compact('subcategory'));
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
            $subcategory = $this->repository->findById($id);
            return $this->view('subcategories.edit', compact('subcategory'));
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

            $subcategory = $this->repository->findById($id);

            $subcategory->update($data);

            return $this->redirect('subcategories.index');
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

            return $this->redirect('subcategories.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
