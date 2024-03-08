<?php

use App\Http\Controllers\admin\{
                                    CategoryController as AdminCategoryController,
                                    BookController as AdminBookController,
                                    AuthorController as AdminAuthorController,
                                    UsersController as AdminUserController,
                                    CarouselController as AdminCarouselController,
                                    AdminController,
                                    WebinfoController
                                };
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/01010-admin-01010', 'middleware' => 'Admin'], function() {

    Route::get('/webinfo/edit-web-info', [WebinfoController::class, 'edit'])->name('admin.webinfo.edit')->middleware('SuperAdmin');
    Route::patch('/webinfo/update', [WebinfoController::class, 'update'])->name('admin.webinfo.update')->middleware('SuperAdmin');

    Route::resource('/users', AdminUserController::class)
    ->names([
            'index' => 'admin.users.index',
            'store' => 'admin.users.store',
            'create' => 'admin.users.create',
            'edit' => 'admin.users.edit',
            'show' => 'admin.users.show',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
    ]);
    // Route::patch('/users/{user}', [AdminUserController::class, 'update'] )->name('admin.users.update');

    Route::resource('/books', AdminBookController::class)
        ->names([
                'index' => 'admin.books.index',
                'store' => 'admin.books.store',
                'create' => 'admin.books.create',
                'edit' => 'admin.books.edit',
                'show' => 'admin.books.show',
                'update' => 'admin.books.update',
                'destroy' => 'admin.books.destroy',

        ]);
        Route::get('/bestbooks/{isBestBooks}', [AdminBookController::class , 'index'])->name('admin.best-books.index');

    Route::patch('/categories/{category}', [AdminCategoryController::class, 'update'] )->name('admin.categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'] )->name('admin.categories.destroy');
    Route::resource('categories/', AdminCategoryController::class)
    ->names([
            'index' => 'admin.categories.index',
            'store' => 'admin.categories.store',
            'create' => 'admin.categories.create',
            'edit' => 'admin.categories.edit',
            'show' => 'admin.categories.show',
            // 'update' => 'admin.categories.update',
        //     'destroy' => 'admin.categories.destroy',
    ]);

    Route::patch('/authors/{author}', [AdminAuthorController::class, 'update'] )->name('admin.authors.update');
    Route::delete('/authors/{author}', [AdminAuthorController::class, 'destroy'] )->name('admin.authors.destroy');
    Route::resource('authors/', AdminAuthorController::class)
    ->names([
            'index' => 'admin.authors.index',
            'store' => 'admin.authors.store',
            'create' => 'admin.authors.create',
            'edit' => 'admin.authors.edit',
            'show' => 'admin.authors.show',
            // 'update' => 'admin.authors.update',
        //     'destroy' => 'admin.authors.destroy',
    ]);
    Route::resource('carousels/', AdminCarouselController::class)
    ->names([
            'index' => 'admin.carousels.index',
            'store' => 'admin.carousels.store',
            'update' => 'admin.carousels.update',
            'destroy' => 'admin.carousels.destroy',
    ]);
    Route::delete('/carousels/{carousel}', [AdminCarouselController::class, 'destroy'] )->name('admin.carousels.destroy');

    Route::get('index', [AdminController::class, 'index'] )->name('admin.index');
    Route::get('/', [AdminController::class, 'index'] )->name('controlpanel');
});
