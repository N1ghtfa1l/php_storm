<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=>'admin'], function () {
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
Auth::routes();
