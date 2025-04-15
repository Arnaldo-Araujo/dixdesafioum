<?php
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/noticias');
});
Route::get('/home', function () {
    return redirect()->route('noticias.index'); // ou redirecione para o dashboard, se preferir
})->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    // Notícias
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/criar', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/noticias/{id}/editar', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/salvar-cor', [ProfileController::class, 'salvarCor'])->name('profile.salvarCor');
    Route::put('/profile/update-foto', [ProfileController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::delete('/profile/remover-foto', [ProfileController::class, 'removerFoto'])->name('profile.removerFoto');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
});
