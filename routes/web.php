<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
        Route::get('/', 'IndexController')->name('main.index');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'role:admin'], function () {
        Route::group(['namespace' => 'Category'], function () {
            Route::get('/', 'IndexController')->name('admin.category.index');
            Route::get('/create', 'CreateController')->name('admin.category.create');
            Route::post('/', 'StoreController')->name('admin.category.store');
            Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
            Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
            Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
        });
        Route::group(['namespace' => 'Item', 'prefix' => 'item'], function () {
            Route::get('/', 'IndexController')->name('admin.item.index');
            Route::get('/create', 'CreateController')->name('admin.item.create');
            Route::post('/', 'StoreController')->name('admin.item.store');
            Route::get('/{item}/edit', 'EditController')->name('admin.item.edit');
            Route::patch('/{item}', 'UpdateController')->name('admin.item.update');
            Route::delete('/{item}', 'DeleteController')->name('admin.item.delete');
        });
    });
});


require __DIR__ . '/auth.php';
