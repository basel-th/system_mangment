<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' =>['auth']], function() {

    Route::resource('users', UserController::class);
    Route::get('users/index',[UserController::class , 'index'])->name('users');
    
    Route::get('roles/index',[RoleController::class,'index'])->name('roles.index');
    Route::get('roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('roles/store',[RoleController::class,'store'])->name('roles.store');
    Route::get('roles/show/{id}', [RoleController::class,'show'])->name('roles.show');
    Route::get('roles/edit/{id}', [RoleController::class,'edit'])->name('roles.edit');
    Route::PATCH('roles/update/{id}', [RoleController::class,'update'])->name('roles.update');
    Route::delete('roles/destroy/{id}',[RoleController::class,'destroy'])->name('roles.destroy');

   });
