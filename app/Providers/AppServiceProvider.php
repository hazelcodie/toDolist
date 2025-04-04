<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
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

        Route::middleware('web')
            ->group(base_path('routes/goals.php'));

        Route::middleware('web')
            ->group(base_path('routes/notes.php'));

        Route::middleware('web')
            ->group(base_path('routes/todo.php'));
    }
}
