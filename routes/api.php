<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\News;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'],function(){
    Route::get('user', [ApiController::class, 'user']);
    Route::post('update-user', [ApiController::class, 'update_user']);
    Route::get('logout', [ApiController::class, 'logout']);
});

Route::post('login', [App\Http\Controllers\Api\ApiController::class, 'login']);
Route::post('signup', [App\Http\Controllers\Api\ApiController::class, 'register']);
Route::get('news', [App\Http\Controllers\Api\ApiController::class, 'all_news']);
Route::get('events', [App\Http\Controllers\Api\ApiController::class, 'all_events']);
Route::get('shops', [App\Http\Controllers\Api\ApiController::class, 'all_shops']);
Route::get('products', [App\Http\Controllers\Api\ApiController::class, 'all_products']);
Route::get('product/{id}', [App\Http\Controllers\Api\ApiController::class, 'product']);
Route::get('streams', [App\Http\Controllers\Api\ApiController::class, 'all_streams']);
Route::get('playeries', [App\Http\Controllers\Api\ApiController::class, 'all_countries']);
Route::get('player/{id}', [App\Http\Controllers\Api\ApiController::class, 'player_detail']);
Route::get('collection', [App\Http\Controllers\Api\ApiController::class, 'collection']);
Route::get('collection/{id}', [App\Http\Controllers\Api\ApiController::class, 'collectionDetail']);
Route::get('sponsors', [ApiController::class, 'sponsors']);
Route::get('/federations', [ApiController::class, 'federations']);
Route::get('/clubs', [ApiController::class, 'clubs']);
Route::get('/club-detail/{id}', [ApiController::class, 'club_detail']);
Route::get('/federation-movements', [ApiController::class, 'federation_movements']);