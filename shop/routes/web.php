<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users;



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
//route to login
Route::get('/', [LoginController::Class,'index'])->name('login');
//logout
Route::get('/logout', [LogoutController::Class, 'destroy'])->name('logout');

//route to store
Route::post('/admin/users/login/store', [LoginController::Class, 'store']);
//route the direction by middleware
Route::middleware(['auth'])->group(function (){
    #group admin router
    Route::prefix('admin')->group(function (){
        Route::get('/', [   ProductController::Class,'index' ])->name('admin');

            
        #group menus router
        Route::prefix('menu')->group(function (){
            Route::get('add', [MenuController::Class,'create' ]);

            Route::post('add', [ MenuController::Class,'store' ]);

            Route::get('list', [MenuController::Class,'index']);

            Route::DELETE('destroy', [MenuController::Class,'destroy']);

            Route::post('edit/{menu}', [MenuController::Class,'update']);

            Route::get('edit/{menu}', [MenuController::Class,'show']);
        });

    
        #group product router
        Route::prefix('product')->group(function(){
            Route::get('add', [ProductController::class, 'create']);

            Route::post('add', [ProductController::class, 'store']);

            Route::get('list', [ProductController::class, 'index']);

            Route::DELETE('destroy', [ProductController::Class,'destroy']);

            Route::get('edit/{product}',[ProductController::Class,'show'] );
            
            Route::post('edit/{product}',[ProductController::Class,'update'] );

        });

    });
});
