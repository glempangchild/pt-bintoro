<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::get('/', function () {
    $result['data'] = Post::all();
    return view('landing', $result);
});
Route::get('/detail/{id}', function ($id) {
    $post = Post::find($id);
    return view('/detail', compact('post'));
});

Route::get('/dashboard', function () {
    $result['data'] = Post::all();
    return view('admin.post', $result);
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
  Route::get('/post',[PostController::class,'index']);
  Route::get('/add-post',[PostController::class,'addPost']);
  Route::post('/post',[PostController::class,'addProc']);
  Route::get('/edit-post/{id}',[PostController::class,'editPost']);
  Route::post('/edit-post',[PostController::class,'editProc']);
  Route::get('/delete-post/{id}',[PostController::class,'deleteProc']);
});

require __DIR__.'/auth.php';
