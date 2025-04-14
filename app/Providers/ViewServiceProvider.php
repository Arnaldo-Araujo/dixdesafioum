<?php
namespace App\Providers;

use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('layouts.navbars.navs.auth', function ($view) {
            $noticias = [];

            if (Auth::check()) {
                $noticias = Noticia::where('user_id', Auth::id())
                    ->latest()
                    ->take(5)
                    ->get();
            }

            $view->with('ultimasNoticias', $noticias);
        });
    }
}
