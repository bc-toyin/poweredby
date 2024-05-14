<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [FranchiseController::class, 'index']);
    Route::post('/', [FranchiseController::class, 'login']);
});

Route::middleware(['franchise'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/accounts/{account_id}/stores/create-store', [StoreController::class, 'create'])->name('stores.create');
    Route::post('/accounts/{account_id}/stores/create-store', [StoreController::class, 'store'])->name('stores.store');
    Route::get('/stores/{store_id}', [StoreController::class, 'show'])->name('stores.show');
    Route::get('/stores/{store_id}/edit', [StoreController::class, 'edit'])->name('stores.edit');
    Route::post('/stores/{store_id}/edit', [StoreController::class, 'update'])->name('stores.update');
    Route::post('/stores/{store_id}/suspend', [StoreController::class, 'suspend'])->name('stores.suspend');
    Route::post('/stores/{store_id}/cancel', [StoreController::class, 'cancel'])->name('stores.cancel');
    Route::post('/stores/{store_id}/reactivate', [StoreController::class, 'reactivate'])->name('stores.reactivate');

    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/create-account', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/accounts/create-account', [AccountController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/{account_id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
    Route::post('/accounts/{account_id}/edit', [AccountController::class, 'update'])->name('accounts.update');
    Route::get('/accounts/{account_id}', [AccountController::class, 'show'])->name('accounts.show');

    Route::post('/stores/{store_id}/change-plan', [PlanController::class, 'changePlan'])->name('plans.change');

    Route::post('/logout', function () {
        session()->flush();
        return redirect('/');
    })->name('logout');
});

// Route::group(['middleware' => ['guest', 'throttle']], function () {
//     Route::get('/{provider}/auth/redirect', [\App\Http\Controllers\Auth\SocialiteController::class ,'redirectToProvider'])->name('login')->where('provider', 'google');
//     Route::get('/{provider}/auth/callback', [\App\Http\Controllers\Auth\SocialiteController::class, 'handleProviderCallback'])->where('provider', 'google');
// });

require __DIR__.'/auth.php';
