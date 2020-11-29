<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|postComment
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('new-ticket', [\App\Http\Controllers\TicketController::class, 'create']);
Route::post('new-ticket', [\App\Http\Controllers\TicketController::class, 'store']);
Route::get('my_tickets', [\App\Http\Controllers\TicketController::class, 'userTickets']);
Route::get('tickets/{ticket_id}', [\App\Http\Controllers\TicketController::class, 'show']);
Route::post('comment', [\App\Http\Controllers\CommentController::class, 'postComment']);
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('new-ticket', [\App\Http\Controllers\TicketController::class, 'create']);
    Route::post('new-ticket', [\App\Http\Controllers\TicketController::class, 'store']);
    Route::get('tickets', [\App\Http\Controllers\TicketController::class, 'index']);
    Route::post('close_ticket/{ticket_id}', [\App\Http\Controllers\TicketController::class, 'close']);

});

