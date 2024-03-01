<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$idRegex = '[0-9]+';
$idRegex = '[0-9a-z\-]+';

Route::get('/',[HomeController::class, 'index']);
Route::get('/biens',[App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}',[App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where(
    [
        "property" => $idRegex,
        "slug" => $idRegex
    ]
);
Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    "property" => $idRegex,
]);

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property', PropertyController::class)->except(["show"]);
    Route::resource('option', OptionController::class)->except(["show"]);
});