<?php

namespace App\Providers;

use App\Repositories\admin\admin\{IAdmin, RAdmin};
use App\Repositories\admin\book\{IBook, RBook};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            IAdmin::class,
            RAdmin::class
         );
        $this->app->bind(
            IBook::class,
            Book::class
        );
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
