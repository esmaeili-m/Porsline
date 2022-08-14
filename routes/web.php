<?php

use App\Http\Controllers\welcomeController;
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
Route::get('/',\App\Http\Livewire\Home\Index::class)->name('start');
Route::get('/end',\App\Http\Livewire\Home\End::class)->name('end');
Route::get('/Question',[welcomeController::class, 'index'])->name('Question');
Route::post('/Question',[welcomeController::class, 'store'])->name('Question.store');

Route::middleware(['auth','admin'])->group(function(){
//     ---------------->user
    Route::get('/user',\App\Http\Livewire\Admin\User\Index::class)->name('user');  //all_user
    Route::get('/CreateUser',\App\Http\Livewire\Admin\User\Create::class)->name('CreateUser.index'); // create_user
    Route::get('/edit/{user}',\App\Http\Livewire\Admin\User\Update::class)->name('user.edit'); //edit_user

    Route::get('/user/show/{user}',\App\Http\Livewire\Admin\User\Show::class)->name('ShowUser.show'); //all day answer
    Route::get('/answer/view/{user}/{day}',\App\Http\Livewire\Admin\User\View::class)->name('view.answers'); //one day answer

    Route::get('/dashboard', \App\Http\Livewire\Admin\Index::class)->middleware(['auth'])->name('home');
    Route::get('/NotificationsStartDay',\App\Http\Livewire\Admin\Question\Notifications\Index::class)->name('NotificationsStartDay');
    Route::get('/NotificationsEndDay',\App\Http\Livewire\Admin\Question\Notifications\EndDay::class)->name('NotificationsEndDay');
    Route::get('/FromCreate',\App\Http\Livewire\Admin\Question\Form\Index::class)->name('FormCreate');
    Route::get('/dashboard/answer',\App\Http\Livewire\Admin\Dashboard\Answer::class)->name('Dashboard.Answer');
    Route::get('/dashboard/notanswer',\App\Http\Livewire\Admin\Dashboard\Notanswer::class)->name('Dashboard.NotAnswer');
    Route::get('/dashboard/haveanswer',\App\Http\Livewire\Admin\Dashboard\Haveanswer::class)->name('Dashboard.haveanswer');
    Route::get('/dashboard/dublicate',\App\Http\Livewire\Admin\Dashboard\Dublicate::class)->name('Dashboard.Dublicate');
    Route::get('/NotificationsDay/{notifications}',\App\Http\Livewire\Admin\Question\Notifications\Update::class)->name('notification.update');
    Route::get('/question', \App\Http\Livewire\Admin\Question\Index::class)->name('question');
//     Route::get('/system',\App\Http\Livewire\Admin\System\Index::class)->name('system');
//     Route::get('/CreateSystem',\App\Http\Livewire\Admin\System\Create::class)->name('CreateSystem');
//     Route::get('/reports',\App\Http\Livewire\Admin\Log\Index::class)->name('reports');
//     Route::get('/trashed',\App\Http\Livewire\Admin\System\Trashed::class)->name('trashed');
//     Route::get('/update/{system}',\App\Http\Livewire\Admin\System\Update::class)->name('update');
    Route::get('/user',\App\Http\Livewire\Admin\User\Index::class)->name('user.index');
    Route::get('/count',\App\Http\Livewire\Admin\Dashboard\Count::class)->name('answer.count');
    Route::get('/chart',\App\Http\Livewire\Admin\Dashboard\Chart::class)->name('answer.chart');
    Route::get('/chart1/{chart}/{option}',\App\Http\Livewire\Admin\Dashboard\Chart\Chart1::class)->name('answer.chart1');

//     Route::get('/CreateUser',\App\Http\Livewire\Admin\User\Create::class)->name('CreateUser.index');
});

require __DIR__.'/auth.php';
