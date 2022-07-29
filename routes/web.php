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
Route::get('/start',\App\Http\Livewire\Home\Index::class)->name('start');
Route::get('/new',\App\Http\Livewire\Home\Form\Index::class)->name('new');
Route::get('/notifications',\App\Http\Livewire\Home\Notifications::class)->name('notifications');

Route::middleware('auth')->group(function(){
     Route::get('/', \App\Http\Livewire\Admin\Index::class)->middleware(['auth'])->name('home');
     Route::get('/NotificationsStartDay',\App\Http\Livewire\admin\question\notifications\Index::class)->name('NotificationsStartDay');
     Route::get('/NotificationsEndDay',\App\Http\Livewire\admin\question\notifications\EndDay::class)->name('NotificationsEndDay');
     Route::get('/FromCreate',\App\Http\Livewire\Admin\Question\Form\Index::class)->name('FormCreate');









     Route::get('/NotificationsDay/{notifications}',\App\Http\Livewire\Admin\Question\Notifications\Update::class)->name('notification.update');
     Route::get('/question', \App\Http\Livewire\Admin\question\Index::class)->name('question');
     Route::get('/system',\App\Http\Livewire\Admin\System\Index::class)->name('system');
     Route::get('/CreateSystem',\App\Http\Livewire\Admin\System\Create::class)->name('CreateSystem');
     Route::get('/reports',\App\Http\Livewire\Admin\Log\Index::class)->name('reports');
     Route::get('/trashed',\App\Http\Livewire\Admin\System\Trashed::class)->name('trashed');
     Route::get('/update/{system}',\App\Http\Livewire\Admin\System\Update::class)->name('update');
     Route::get('/user',\App\Http\Livewire\Admin\User\Index::class)->name('user.index');
     Route::get('/CreateUser',\App\Http\Livewire\Admin\User\Create::class)->name('CreateUser.index');
     Route::get('/edit/{user}',\App\Http\Livewire\Admin\User\Update::class)->name('user.edit');
 });

require __DIR__.'/auth.php';
