<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('login.index');
});


// Route::get('/dashboard', function () {
//     return view('movie.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [MovieController::class,'dashboard'])
->middleware(['auth', 'verified'])
->name('dashboard');


//プロフィールの編集画面(breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//マイページ表示ページ
Route::get('/movie/mypage', [MovieController::class, 'myPage'])->name('user.mypage')->middleware('auth');



Route::get('/movie', [MovieController::class, 'index'])
->name('movie.index');

//いらないかも
// Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::get('/movie/reserch', [MovieController::class, 'reserch'])->name('movie.reserch');

// Route::post('/movie/{id}/reviews', [MovieController::class, 'storeReview'])->name('reviews.store');

//映画の詳細表示
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movie.show');


//お気に入り登録機能
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store')->middleware('auth');

//お気に入り削除機能
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy')->middleware('auth');

//レビュー投稿
// Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');


//レビューページへジャンプ
Route::get('/reviews/create', [ReviewController::class, 'create'])
->name('reviews.create')
->middleware('auth');

//レビュー投稿  
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');


//レビューリスト表示
Route::get('/reviews/index', [ReviewController::class, 'index'])->name('reviews.index');

// Route::get('/reviews/{movie}', [ReviewController::class, 'show'])->name('review.show');


Route::get('/users/{id}', [ProfileController::class, 'show'])->name('user.show');






require __DIR__.'/auth.php';
