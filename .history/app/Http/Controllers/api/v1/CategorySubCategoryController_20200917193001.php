<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Api\ApiCrudHandler;
use App\Requests\CategorySubCategoryRequest;
use App\Models\CategorySubCategory;
use Validator;

class CategorySubCategoryController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct()
    {
        $this->apiCrudHandler = new ApiCrudHandler();
    }

    public function index(Request $request)
    {
        try {

            /*if ($request->has('parent_id')) {
                $with = ['subCategory'];
            }*/

            if (\Request::segment(2) == 'categories') {
                $where = ['parent_id' => NULL];
            } elseif (\Request::segment(2) == 'sub-categories') {
                $with = ['category:id,name'];
                $where = ['parent_id' =>  !NULL];
            }
            $modelData = $this->apiCrudHandler->index($request, CategorySubCategory::class, $where, $with ?? []);
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
    *
     * @param Request $request
     * @param String $moduleName
     * @param String $modelClassName   
     *
     * @return Array
     */
    public function store(CategorySubCategoryRequest $request)
    {       
        try {
            $modelData = $this->apiCrudHandler->store($request, CategorySubCategory::class);           
            return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
    *
     * @param Request $request
     * @param String $moduleName
     * @param String $modelClassName   
     *
     * @return Array
     */
    public function update($id, CategorySubCategory $request, CategorySubCategory $categorySubCategory)
    {
        //If ID then update, else create
        try { 
            $request->request->add(['id' => $id]);
            $modelData = $this->apiCrudHandler->update($request, CategorySubCategory::class);
            return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, CategorySubCategory $categorySubCategory)
    {
        try {
            $delete = $this->apiCrudHandler->delete($id, CategorySubCategory::class);
            return $this->sendResponse($delete);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }  
    }

    public function getSubCategoryByCategory(Request $request, $category_id)
    {
        try {            
            $where = ['parent_id' => $category_id];
            $modelData = $this->apiCrudHandler->index($request, CategorySubCategory::class, $where, $with ?? []);
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
