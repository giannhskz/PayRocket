<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderDashboard;
use App\Http\Controllers\ProviderLoginController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/provider/login', [ProviderLoginController::class, 'showLoginForm'])->name('provider.login');

Route::post('/provider/login', [ProviderLoginController::class, 'login'])
    ->name('/provider.login');

Route::get('/provider/dashboard', [ProviderDashboard::class, 'dashboard'])->name('provider.dashboard');


Route::post('/provider/logout', [ProviderLoginController::class, 'logout'])->name('provider.logout');




Route::post('/admin/login', [\App\Http\Controllers\AdminLoginController::class, 'login'])
    ->name('/admin.login');

Route::post('/admin/logout', [\App\Http\Controllers\AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/login', [\App\Http\Controllers\AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboard::class, 'getDashboard'])->name('admin.dashboard');

Route::post('/admin/add-provider', [\App\Http\Controllers\AdminDashboard::class, 'addProvider'])->name('admin.add-provider');

Route::delete('/admin/delete/provider/{provider}', [\App\Http\Controllers\AdminDashboard::class, 'deleteProvider'])->name('admin.delete.provider');



require __DIR__.'/auth.php';
