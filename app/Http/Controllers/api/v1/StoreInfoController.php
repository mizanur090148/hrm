<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Api\ApiCrudHandler;
use App\Requests\StoreInfoRequest;
use App\Models\StoreInfo;
use Illuminate\Http\Response;
use Validator;

class StoreInfoController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }

    public function index(Request $request)
    {
        try {
            $with = [
                'outlet:id,name',
                'category:id,name',
                'sub_category:id,name',
                'color:id,name',
                'size:id,name',
                'created_by:id,first_name,last_name'
            ];
        	$modelData = $this->apiCrudHandler->index($request, StoreInfo::class, $where = [], $with);
        	return $this->sendResponse($modelData);
        } catch (Exception $e) {
        	return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @param StoreInfoRequest $request
     * @return Array
     */
    public function store(StoreInfoRequest $request): array
    {
        //If exist ID then update, else create
        try {
        	$modelData = $this->apiCrudHandler->store($request, StoreInfo::class);
        	return $this->sendResponse($modelData);
        } catch (Exception $ex) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        try {
        	$delete = $this->apiCrudHandler->delete($id, StoreInfo::class);
        	return $this->sendResponse($delete);
        } catch (Exception $e) {
        	return $this->sendError($e->getMessage());
        }
    }
}
