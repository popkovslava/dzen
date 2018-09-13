<?php

use Illuminate\Http\Request;

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

Route::get('/stack', 'Api\StackController@index', ['as' => 'api.stack.index']);
Route::get('/work', 'Api\WorkController@index', ['as' => 'api.work.index']);
Route::get('/stack-category', 'Api\StackCategoryController@index', ['as' => 'api.stack-category.index']);
Route::get('/page', 'Api\PageController@index', ['as' => 'api.page.index']);

Route::resource('upload', 'UploadController', ['only' => [
        'store', 'destroy'
    ]
]);
