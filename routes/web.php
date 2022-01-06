<?php

use App\Http\Controllers\CaptchaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/maintenance', function () {
  return response()->view('maintenance')->setStatusCode(503);
})->middleware('captcha');

Route::get('/cleanup', function () {
  Artisan::call('view:clear');
  Artisan::call('cache:clear');
  Artisan::call('optimize:clear');
  return "done.";
});

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

Route::get('/', [CaptchaController::class, 'Index'])->name('Captcha');
Route::post('/captcha-compare', [CaptchaController::class, 'Compare'])->name('CaptchaCompare');
