<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*

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

Auth::routes([
    'verify' => true
]);

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'home', 'middleware' => ['parent_check']], function(){
        Route::get('/', 'App\Http\Controllers\TaskController@index')->name('home.index');
        Route::get('/{id}/show/', 'App\Http\Controllers\TaskController@show')->name('home.show');
        Route::post('/', 'App\Http\Controllers\TaskController@store')->name('home.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\TaskController@edit')->name('home.edit');
        Route::put('/{id}/edit', 'App\Http\Controllers\TaskController@update')->name('home.update');
        Route::delete('/{id}/delete', 'App\Http\Controllers\TaskController@destroy')->name('home.destroy');
        Route::get('exit-parent', 'App\Http\Controllers\TaskController@exitParentSection')->name('exit-parent');
    });
    Route::get('home/done/{id}', [TaskController::class, 'done']);
    Route::post('check-parent',  [TaskController::class, 'checkParent'])->name('check-parent');
    Route::get('/parent', function () {
            return view('auth.passwords.parents_password');
    })->name('parents');
    Route::get('/list',  [TaskController::class, 'list'])->name('list');
    Route::resource('/members',  'App\Http\Controllers\MemberController', ['names' => 'members']);
    
    
    
});

