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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InjectorController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\ProductsController;

Route::get('/injector', [InjectorController::class, 'show'])
    ->name('injector');

Route::get('/', [ProductsController::class, 'showList'])
    ->name('list');

Route::get('/product/{product}', [ProductsController::class, 'showProduct'])
    ->name('product');

Route::group(['prefix' => 'parser'], function () {
    Route::get('/', [ParserController::class, 'index'])
        ->name('parser');
    Route::post('/', [ParserController::class, 'add'])
        ->name('parser.add');
});
