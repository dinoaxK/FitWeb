<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mobileapp\RegUsersController;
use App\Http\Controllers\Mobileapp\StudentExamController;
use App\Http\Controllers\Mobileapp\StduentDetailsController;
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

Route::get("reguserCount",[RegUsersController::class,'countRegUser']);
Route::get('examSchedule',[StudentExamController::class,'examSchedule']);
Route::get('studentDetails',[StduentDetailsController::class,'studentDetails']);
Route::get('searchStudents',[StduentDetailsController::class,'searchStudents']);
