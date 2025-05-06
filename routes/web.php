<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Authorize\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index', ['title' => 'Главная']);
}) -> name('home');

Route::get('/about', function () {
    return view('pages.about', ['title' => 'О нас']);
}) -> name('about');

Route::get('/users/masters', [\App\Http\Controllers\UserController::class, 'allMasters']) -> name('masters');

Route::get('/register', function () {
    return view('pages.register', ['title' => 'Регистрация']);
}) -> name('register');

Route::get('/login', function () {
    return view('pages.login', ['title' => 'Вход']);
}) -> name('login');
Route::post('/login', AuthController::class)->name('post.login');
Route::post('/register', \App\Http\Controllers\Authorize\RegisterController::class)->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('pages.profile', [
            'title' => 'Личный кабинет',
            'user' => Auth::user(),
            'orders' => Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }) -> name('lk');
    Route::post('/logout', \App\Http\Controllers\Authorize\LogoutController::class)->name('logout');
    Route::post('/upload', [UserController::class, 'uploadImage'])->name('upload');
    Route::post('/delete', [UserController::class, 'deleteImage'])->name('deleteImage');
    Route::get('create', [\App\Http\Controllers\UserController::class, 'createOrder'])-> name('create');
    Route::get('/order/{uuid}', [\App\Http\Controllers\OrderController::class, 'showOrder'])-> name('show-order');
    Route::post('create_request', RequestController::class)->name('create.post');
    Route::middleware('role.accept')->group(function () {
        Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'show'])-> name('orders.index');
        Route::get('/requests', [AdminController::class, 'getRequests']) -> name('requests');
        Route::post('/create_order', [OrderController::class, 'action'])->name('order.accept');
        Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('/order/{id}/update', [OrderController::class, 'update'])->name('order.update');
        Route::delete('/order/{id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');
        Route::get('/masters', function() {
            return view('admin.masters', ['title' => 'Мастера', 'masters' => \App\Models\Master::all()]);
        })->name('admin.masters');
        Route::get('/create_master', function() {
           return view('admin.add_master', ['title' => 'Добавить мастера',
               'users' => \App\Models\User::where('role', 'пользователь')->get(),
               'masters' => \App\Models\Master::all()]);
        })->name('add.master');
        Route::post('/create_master', [UserController::class, 'createMaster'])->name('create.master');
        Route::post('/delete_master', [UserController::class, 'deleteMaster'])->name('delete.master');
        Route::get('/my_tasks', [OrderController::class, 'myTasks']) -> name('master.tasks');
    });
});
