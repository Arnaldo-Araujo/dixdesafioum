<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ✅ Página inicial pública
Route::get('/', function () {
    return view('welcome');
});

// ✅ Autenticação padrão
Auth::routes();

// ✅ Página inicial após login
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// ✅ CRUD de Notícias
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class)->except(['show']);
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/criar', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');

    // ✅ Edição de Noticias
    Route::get('/noticias/{id}/editar', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');

    // ✅ Deleção de Noticias

    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

    // ✅ Rotas de perfil
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('icons', [PageController::class, 'icons'])->name('pages.icons');
    Route::get('maps', [PageController::class, 'maps'])->name('pages.maps');
    Route::get('notifications', [PageController::class, 'notifications'])->name('pages.notifications');
    Route::get('rtl', [PageController::class, 'rtl'])->name('pages.rtl');
    Route::get('tables', [PageController::class, 'tables'])->name('pages.tables');
    Route::get('typography', [PageController::class, 'typography'])->name('pages.typography');
    Route::get('upgrade', [PageController::class, 'upgrade'])->name('pages.upgrade');
});
