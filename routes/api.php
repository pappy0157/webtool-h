<?php

use App\Http\Controllers\API\TestController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('nearest-server', [ TestController::class, 'nearestServer' ] )->name('nearest-server');
Route::post('search-servers', [ TestController::class, 'searchServers' ] )->name('search-servers');
Route::post('record-test',    [ TestController::class, 'store'         ] )->name('record-test');