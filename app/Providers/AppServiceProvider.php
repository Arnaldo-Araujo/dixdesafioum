<?php
namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (env('DB_CONNECTION') === 'sqlite') {
            $dbPath = database_path('database.sqlite');

            if (! file_exists('/tmp/database.sqlite')) {
                file_put_contents('/tmp/database.sqlite', '');
            }

            config(['database.connections.sqlite.database' => '/tmp/database.sqlite']);
        }
    }
}
