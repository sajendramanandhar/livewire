<?php

use App\Http\Livewire\CreateUser;
use App\Http\Livewire\ShowUsers;
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

Route::get('/', ShowUsers::class);
Route::get('/users', ShowUsers::class)->name('users.index');
Route::get('users/create', CreateUser::class)->name('users.create');
