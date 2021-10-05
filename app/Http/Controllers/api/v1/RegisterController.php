<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Requests\RegisterRequest;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
    	try {
			$user = User::create($request->all());
			return $this->sendResponse($user);
        } catch (Exception $e) {
    	    dd($e->getMessage());
            return $this->sendError($e->getMessage());
        }
    }
}
