<?php

namespace App\Providers;

use App\Http\ViewComposers\{AuthorComposer,
                            CategoryComposer,
                            WebInfoComposer};
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['lists.ul-categories', 'index'], CategoryComposer::class);
        View::composer(['lists.ul-authors'], AuthorComposer::class);
        View::composer(['layouts.main', 'layouts.test', 'layouts.guest', 'index', 'share.books.details', 'cart'], WebInfoComposer::class);

        Blade::if('admin', function(){
            return auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin());
        });
        Blade::if('superadmin', function(){
            return auth()->check() && auth()->user()->isSuperAdmin();
        });
    }

        /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->singleton(CategoryComposer::class);
       $this->app->singleton(WebInfoComposer::class);
    }
}
