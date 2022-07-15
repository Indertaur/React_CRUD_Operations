<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

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

Route::get('/employees', [EmployeesController::class, 'index']);
Route::post('/add-employee', [EmployeesController::class, 'store']);
Route::delete('/delete-employee/{id}', [EmployeesController::class, 'delete']);
Route::get('/employee/{id}', [EmployeesController::class, 'single']);
Route::post('/update-employee/{id}', [EmployeesController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
