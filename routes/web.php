<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\BarterRequestController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentForumController;
>>>>>>> Stashed changes

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
Route::get('/front', function () {
    return view('front/layout');
});
Route::get('/back', function () {
    return view('back/layout');
});
<<<<<<< Updated upstream
=======
Route::resource("barterRequests", BarterRequestController::class);
Route::resource("forum", ForumController::class);
Route::resource("commentforum", CommentForumController::class);
>>>>>>> Stashed changes
