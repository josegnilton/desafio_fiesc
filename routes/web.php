<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'tasks', 'namespace' => 'App\Http\Controllers'], function() {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::get('/create', 'TaskController@create')->name('tasks.create');
    Route::post('/', 'TaskController@store')->name('tasks.store');
    Route::get('/{id}/edit', 'TaskController@edit')->name('tasks.edit');
    Route::put('/{id}', 'TaskController@update')->name('tasks.update');
    Route::get('/{task}', 'TaskController@show')->name('tasks.show');
    Route::put('/{task}/finalize', 'TaskController@finalize')->name('tasks.finalize');
    Route::post('/{task}/observations', 'TaskController@addObservation')->name('tasks.addObservation');
    Route::put('/{taskId}/observations/{observationId}', 'TaskController@updateObservation')->name('tasks.updateObservation');
    Route::post('/{task}/assume', 'TaskController@assume')->name('tasks.assume');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



