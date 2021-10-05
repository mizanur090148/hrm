<?php

namespace App\Http\Controllers\api\v1\settings;

use App\Http\Controllers\api\v1\ApiCrudHandler;
use App\Http\Controllers\api\v1\BaseController;
use App\Models\Settings\Weekend;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeekendController extends BaseController
{
    protected $apiCrudHandler;

    public function __construct(ApiCrudHandler $apiCrudHandler)
    {
        $this->apiCrudHandler = $apiCrudHandler;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $modelData = $this->apiCrudHandler->index($request, Weekend::class);
            dd($modelData->pluck('weekend_day_name'));
            return $this->sendResponse($modelData);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $modelData = $this->apiCrudHandler->show($id, Weekend::class);
            return $this->sendResponse($modelData);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update($factoryId, Request $request)
    {
        try {
            dd(99);
            DB::beginTransaction();
            Weekend::where('factory_id', $factoryId)->delete();
            $input = [];
            foreach ($request->weekend_day_name as $dayName) {
                $input[] = [
                    'weekend_days' => $dayName,
                    'factory_id'   => $request->factory_id
                ];
            }
            Weekend::insert($input);
            DB::commit();
            // $modelData = $this->apiCrudHandler->update($id, $request, Weekend::class);
            return $this->sendResponse(true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}