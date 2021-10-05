<?php

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

use App\Http\Controllers\Api\V1\FactoryController;

Route::get('/', function() {
	dd(999);
});
/*Route::get('get-atp-readings/{storeNumber}', 'GetAtpReadings');
Route::get('get-janitorial-schedule/{storeNumber}', 'GetJanitorialSchedule');
Route::get('get-janitorial-compliance/{storeNumber}/{date}', 'GetJanitorialCompliance');
Route::get('get-janitorial-compliance-history/{storeNumber}', 'GetJanitorialComplianceHistory');
Route::post('atp-readings', 'SaveAtpReadings');
Route::post('janitorial-compliance', 'SaveJanitorialCompliance');*/
