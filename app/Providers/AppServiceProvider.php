<?php

namespace App\Providers;

use App\Http\Repositories\ContactRepo;
use App\Http\Repositories\ContactRepoInterface;
use App\Http\Services\ContactService;
use App\Http\Services\ContactServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContactServiceInterface::class,ContactService::class);
        $this->app->singleton(ContactRepoInterface::class,ContactRepo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
