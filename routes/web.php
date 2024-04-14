<?php

use App\Http\Controllers\HelloController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return 'home';
})->name('homePage');

Route::get(
    '/hello', fn() => 'hello world!'
)
    ->middleware([EnsureTokenIsValid::class])
;

Route::permanentRedirect('/hello2', '/hello');

Route::get('/test/{id}', [HelloController::class, 'test'])
    ->whereNumber('id')
    ->name('test-id');

Route::controller(HelloController::class)->group(function () {
    Route::get('/order', 'getOrder');
    Route::post('/order-post', 'createOrder');
});
