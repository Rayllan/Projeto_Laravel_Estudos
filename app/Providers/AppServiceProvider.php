<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        //Schema::defaultStringLength(191);
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);
    }
}
