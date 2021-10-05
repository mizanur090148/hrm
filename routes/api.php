<?php

use App\Http\Controllers\api\v1\settings\LeaveController;
use App\Http\Controllers\api\v1\settings\WeekendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\v1\settings\FactoryController;
use App\Http\Controllers\api\v1\settings\DepartmentController;
use App\Http\Controllers\api\v1\RegisterController;
use App\Http\Controllers\api\v1\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/group', [FactoryController::class, 'groupStore']);
Route::post('/login', [AuthController::class, 'login']);


//Route::group(['middleware' => ['auth:sanctum']], function () {
	Route::prefix('settings')->group(function () {
        Route::post('/group', [FactoryController::class, 'groupStore']);
		Route::get('/factories', [FactoryController::class, 'index']);
		Route::get('/factories/{id}', [FactoryController::class, 'show']);
		Route::post('/factories', [FactoryController::class, 'store']);
		Route::delete('/factories/{id}', [FactoryController::class, 'delete']);

        Route::get('/departments', [DepartmentController::class, 'index']);
        Route::post('/departments', [DepartmentController::class, 'store']);
        Route::patch('/departments/{id}', [DepartmentController::class, 'update']);
        Route::delete('/departments/{id}', [DepartmentController::class, 'delete']);

        Route::get('/leaves', [LeaveController::class, 'index']);
        Route::get('/leaves/{id}', [LeaveController::class, 'show']);
        Route::post('/leaves', [LeaveController::class, 'store']);
        Route::patch('/leaves/{id}', [LeaveController::class, 'update']);
        Route::delete('/leaves/{id}', [LeaveController::class, 'delete']);

        Route::get('/weekends', [WeekendController::class, 'index']);
        Route::get('/weekends/{id}', [WeekendController::class, 'show']);
        Route::post('/weekends', [WeekendController::class, 'store']);
        Route::post('/weekends', [WeekendController::class, 'update']);
	});
//});
