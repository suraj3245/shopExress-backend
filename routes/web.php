<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/admin/dashboard');
});

Route::middleware(['auth', 'verified'])->group(function(){
  Route::resource('subuser', SubUserController::class);
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
  Route::resource('roles', RoleController::class);
  Route::post('/subuser/{id}', [SubUserController::class, 'update'])->name('subuser.update');
  Route::resource('roles', RoleController::class);
  Route::resource('permissions', PermissionController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
