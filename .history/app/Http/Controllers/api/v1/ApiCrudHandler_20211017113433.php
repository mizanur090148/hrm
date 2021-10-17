<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiCrudHandler
{
    /**
     * @param String $modelClassName
     * @param Request $request
     *
     * @return Array
     */
    public function index(Request $request, $modelClassName, array $where = [], array $with = [])
    {
        // Load model class object
        $modelData = new $modelClassName();
        // where
        if (count($where)) {
            $modelData = $modelData->where($where);
        }
        // eager load data
        if (count($with)) {
            $modelData = $modelData->with($with);
        }
        $modelData = $modelData->orderBy($request->sortByColumn ?? 'id', $request->sortBy ?? 'desc');
        return $modelData->get();
    }

    /**
     * @param String $modelClassName
     * @param Request $request
     *
     * @return Array
     */
    public function all(Request $request, $modelClassName, array $where, array $with)
    {
        // Load model class object
        $modelData = new $modelClassName();
        // where
        if (count($where)) {
            $modelData = $modelData->where($where);
        }
        // eager load data
        if (count($with)) {
            $modelData = $modelData->with($with);
        }
        $modelData = $modelData->orderBy($request->sortByColumn ?? 'id', $request->sortBy ?? 'desc');
        return $modelData->get();
    }

    /**
     * @param Request $request
     * @param String $moduleName
     * @param String $modelClassName
     * @param Array $arrFieldsToSave
     *
     * @return Array
     */
    public function store(Request $request, $modelClassName)
    {
        $obj = $modelClassName::findOrNew($request->id);
        $obj->fill($request->all());
        $obj->save();

        return $obj;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $modelClassName, $with = [])
    {
        $modelData = $modelClassName::with($with)->find($id);
        return $modelData;
    }

    /**
     * @param Request $request
     * @param String $moduleName
     * @param String $modelClassName
     * @param Array $arrFieldsToSave
     *
     * @return Array
     */
    public function update($id, Request $request, string $modelClassName)
    {
        $obj = $modelClassName::find($id);
        $obj->fill($request->all());
        $obj->save();

        return $obj;
    }

    /**
     * @param String $modelClassName
     * @param String $id
     *
     * @return Boolean
     */
    public function delete($id, $modelClassName)
    {
        //Load selected model
        $data = $modelClassName::find($id);
        if ($data) {
            $data = $data->delete();
        } else {
            $data = 'Not found Data';
        }
        return $data;
    }
}
