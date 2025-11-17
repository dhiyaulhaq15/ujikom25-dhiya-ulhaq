<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberProductController;
use App\Http\Controllers\MemberStoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\Public\ProductPublicController;
use App\Http\Controllers\PublicProduct;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/public', [HomeCotroller::class, 'index']);

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::resource('stores', StoreController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::delete('product-images/{image}', [ProductImageController::class, 'destroy'])->name('product-images.destroy');
    Route::resource('stores', StoreController::class);
    Route::put('/stores/{store}/approve', [StoreController::class, 'approve'])->name('stores.approve');
    Route::put('/stores/{store}/deactivate', [StoreController::class, 'deactivate'])->name('stores.deactivate');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::put('/transactions/{id}/status', [TransactionController::class, 'updateStatus'])->name('admin.transactions.updateStatus');
});


// Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'registerForm']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/admin', fn() => view('admin.dashboard'))->middleware(['auth', 'role:admin']);
// Route::get('/member', fn() => view('public.homepage'))->middleware(['auth', 'role:member']);
Route::get('/1', [HomeCotroller::class, 'storeMember'])
    ->middleware(['auth', 'role:member']);
// Route::get('/products', [ProductPublicController::class, 'index'])->name('public.product');
Route::get('/products', [ProductPublicController::class, 'index'])->name('public.product');


// Route::middleware(['auth', 'role:member'])->group(function () {
//     Route::get('/member', [MemberController::class, 'index'])->name('member.dashboard');
// });
// Route::get('/member/store/create', [MemberStoreController::class, 'create'])
//     ->middleware(['auth', 'role:member'])
//     ->name('store.create');
// Route::post('/member/store/store', [MemberStoreController::class, 'store'])
//     ->middleware(['auth', 'role:member'])
//     ->name('store.store');
// Route::get('/member/store/pending', [MemberStoreController::class, 'pending'])
//     ->middleware(['auth', 'role:member'])
//     ->name('store.pending');
Route::middleware(['auth', 'role:member'])->prefix('member')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('member.dashboard');
    Route::get('/store/create', [MemberStoreController::class, 'create'])->name('store.create');
    Route::post('/store/store', [MemberStoreController::class, 'store'])->name('store.store');
    Route::get('/store/pending', [MemberStoreController::class, 'pending'])->name('store.pending');
    Route::get('/products', [MemberProductController::class, 'index'])
        ->name('member.products.index');

    Route::get('/products/create', [MemberProductController::class, 'create'])
        ->name('member.products.create');

    Route::post('/products', [MemberProductController::class, 'store'])
        ->name('member.products.store');

    Route::get('/products/{id}/edit', [MemberProductController::class, 'edit'])
        ->name('member.products.edit');

    Route::post('/products/{id}', [MemberProductController::class, 'update'])
        ->name('member.products.update');

    Route::get('/member/store/edit', [MemberStoreController::class, 'edit'])->name('store.edit');
    Route::post('/member/store/update', [MemberStoreController::class, 'update'])->name('store.update');
});

// Route::put('/stores/{store}/approve', [StoreController::class, 'approve'])->name('stores.approve');
// Route::put('/stores/{store}/deactivate', [StoreController::class, 'deactivate'])->name('stores.deactivate');
Route::get('/store/{store}/edit', [MemberStoreController::class, 'edit'])->name('store.edit');
Route::put('/store/{store}', [MemberStoreController::class, 'update'])->name('store.update');
Route::get('/buy/{product}', [TransactionController::class, 'create'])->name('transaction.form');
Route::post('/buy/{product}', [TransactionController::class, 'store'])->name('transaction.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/member/transactions', [TransactionController::class, 'index'])
        ->name('member.transactions');

    Route::put('/member/transactions/{transaction}/confirm', [TransactionController::class, 'confirm'])
        ->name('transactions.confirm');

    Route::put('/member/transactions/{transaction}/reject', [TransactionController::class, 'reject'])
        ->name('transactions.reject');
});

Route::get('/admin/transactions/{id}/print', [TransactionController::class, 'print'])
    ->name('admin.transactions.print');
