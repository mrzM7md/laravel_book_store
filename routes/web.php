<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;


############################### Routes for all users ###############################


Route::get('/', function(){
    return redirect(route('home'));
});

Route::get ('create-symlink', function () {
    Artisan::call ('storage:link');
    return response ('Done...');
});


Route::resource('/books',BookController::class);
Route::get('/books/type/{booksType}',[BookController::class, 'books'])->name('books-book.books');
Route::get('/books/type/{booksType}/search/',[BookController::class, 'books'])->name('books.search');
Route::get('/books/type/{booksType}/autocomplete',[BookController::class, 'autocomplete'])->name('books.autocomplete');


Route::post('/categories/{slug}/search/',[BookController::class, 'rate'])->name('book.rate');

Route::get('/authors/{slug}',[AuthorController::class, 'index'])->name('slug-authors.index');
Route::get('/authors/{slug}/search/',[AuthorController::class, 'index'])->name('authors.search');
Route::get('/authors/{slug}/autocomplete',[AuthorController::class, 'autocomplete'])->name('authors.autocomplete');


Route::get('/categories/{slug}',[CategoryController::class, 'index'])->name('slug-categories.index');
Route::get('/categories/{slug}/search/',[CategoryController::class, 'index'])->name('categories.search');
Route::get('/categories/{slug}/autocomplete',[CategoryController::class, 'autocomplete'])->name('categories.autocomplete');


Route::post('/books/{slug}/add_to_cart',[CartController::class, 'addToCart'])->name('add.cart');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');
Route::delete('/removeAll/{book}', [CartController::class, 'removeAll'])->name('cart.remove_all');


// Route::get('/', function () {
//     return view('layouts.main');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'profile'
])->group(function () {
    Route::get('/dashboard', function () {
    // Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/books', [BookController::class, 'index'])->name('home');

// Route::resource('/books', BookController::class);

