<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentapiController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\API\AuthController;



/*
|------------------------------------------------                     --------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register',[AuthController::class,'register']);
Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('logout',[AuthController::class,'logout']);
Route::post('employee/add',[EmployeeController::class,'store']);
Route::get('employees',[EmployeeController::class,'index']);
Route::get('employee/{id}/show',[EmployeeController::class,'show']);
//Route::put('employee/{id}/update',[EmployeeController::class,'update']);
Route::post('employee/{id}/update',[EmployeeController::class,'update']);
Route::delete('employee/{id}/remove',[EmployeeController::class,'remove']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
});
Route::post('/student','StudentapiController@create');
//Route::get('/student','StudentapiController@show');
//Route::resource('student', [StudentapiController::class]);
//Sumarry of my github APIS