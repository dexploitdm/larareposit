<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::resource('/','IndexController',[
    'only'=>['index'],
    'names'=> ['index'=>'home']
]);


Route::resource ('articles', 'ArticleController',[
    'parameters' => [
        'articles' => 'alias'
    ]
]);
Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticleController@index','as'=>'articleCat'])->where('cat_alias','[\w-]+');