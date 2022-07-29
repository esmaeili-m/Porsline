<?php

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

Route::get('/', \App\Http\Livewire\Admin\Index::class)->name('home');
Route::get('/system',\App\Http\Livewire\Admin\System\Index::class)->name('system');
Route::get('/CreateSystem',\App\Http\Livewire\Admin\System\Create::class)->name('CreateSystem');
Route::get('/reports',\App\Http\Livewire\Admin\Log\Index::class)->name('reports');
Route::get('/trashed',\App\Http\Livewire\Admin\System\Trashed::class)->name('trashed');
Route::get('/update/{system}',\App\Http\Livewire\Admin\System\Update::class)->name('update');