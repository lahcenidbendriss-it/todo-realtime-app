<?php

use Illuminate\Support\Facades\Route;
use App\Events\TaskCreated;
use App\Models\Task;


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
    return view('welcome');
});
Route::get('/test-broadcast', function () {
    $task = \App\Models\Task::latest()->first();
    broadcast(new TaskCreated($task))->toOthers();
    return 'Broadcast sent!';
});
