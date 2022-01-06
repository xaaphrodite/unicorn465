<?php

use App\Http\Controllers\CaptchaController;
use Illuminate\Support\Facades\Route;

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
