<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DeviceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', [CustomAuthController::class, 'customLogin']);
Route::post('login', [CustomAuthController::class, 'apiLogin']);

Route::post('deviceinfo',[DeviceController::class, 'storeDevice']);

Route::post('add-checksum',[DeviceController::class, 'storeChecksum']);

Route::get('checksum',[DeviceController::class, 'indexChecksum']);

Route::get('devices',[DeviceController::class, 'indexDevice']);

Route::get('device/search/{macid}',[DeviceController::class, 'indexDevicesearch']);

Route::get('media/search/{movies_name}',[DeviceController::class, 'indexMoviesearch']);

Route::put('media/updatemovies/{id}',[DeviceController::class, 'updateSeriesDevice']);

Route::get('media/deletemovies/{id}',[DeviceController::class, 'deleteSeriesDevice']);

Route::get('media/editmovies/{id}',[DeviceController::class, 'editSeriesDevice']);

Route::get('media/movies',[DeviceController::class, 'indexSeriesDevice']);

Route::post('media/movie-name',[DeviceController::class, 'seriesDevice']);

Route::post('changeItemStatus/{id}',[DeviceController::class, 'changeItemStatus']);

Route::delete('deletedeviceinfo/{id}',[DeviceController::class, 'deleteDeviceinfo']);

Route::delete('deletechecksum/{id}',[DeviceController::class, 'deleteChecksum']);


