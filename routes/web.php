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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function() {
    return view('test');
})->name('test');

Route::get('/addSkill', function() {
    return view('addSkill');
})->name('addSkill');

Route::get('/modifSkill', function() {

    return view('modifSkill');
})->name('modifSkill');

Route::get('/suppSkill', function() {
    return view('suppSkill');
})->name('suppSkill');

Route::get('/select', 'SkillController@show')->name('select');
Route::delete('/suppSkill', 'SkillController@destroy')->name('suppSkill_done');
Route::post('/addSkill', 'SkillController@create')->name('addSkill_done');
Route::post('/modifSkill', 'SkillController@update')->name('modifSkill_done');