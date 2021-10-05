<?php

namespace App\Http\Controllers\api\v1\settings;

use App\Http\Controllers\api\v1\ApiCrudHandler;
use App\Http\Controllers\api\v1\BaseController;
use App\Models\Settings\Leave;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeaveController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            $with = ['factory'];
            $modelData = $this->apiCrudHandler->index($request,Leave::class, $where = [], $with);
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return Response
     */
    public function show($id)
    {
        try {
            $modelData = $this->apiCrudHandler->show($id, Leave::class);
            return $this->sendResponse($modelData);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\Leave  $leave
     * @return Response
     */
    public function update($id, Request $request)
    {
        try {
            $modelData = $this->apiCrudHandler->update($id, $request, Leave::class);
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
