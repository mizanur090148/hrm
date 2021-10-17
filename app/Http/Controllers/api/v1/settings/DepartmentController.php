<?php

namespace App\Http\Controllers\api\v1\settings;

use App\Http\Controllers\api\v1\ApiCrudHandler;
use App\Models\Settings\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\UserRequest;
use Validator;

class DepartmentController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }

    public function index(Request $request)
    {
        try {
        	return $modelData = $this->apiCrudHandler->index($request, Department::class);
        	return $this->sendResponse($modelData);
        } catch (Exception $e) {
        	return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @param UserRequest $request
     * @return Array
     */
    public function store(UserRequest $request)
    {
        //If ID then update, else create
        try {
            $modelData = $this->apiCrudHandler->store($request, Department::class);
            return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @param int $id
     * @param Request $request
     * @return Array
     */
    public function update(int $id, Request $request)
    {
    	//If ID then update, else create
        try {
        	$request->request->add(['id' => $id]);
        	$modelData = $this->apiCrudHandler->update($request, Department::class);
        	return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
        	$response = $this->apiCrudHandler->delete($id, Department::class);
        	return $this->sendResponse($response);
        } catch (Exception $e) {
        	return $this->sendError($e->getMessage());
        }
    }
}
