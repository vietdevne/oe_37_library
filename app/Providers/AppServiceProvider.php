<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AuthorRepository;
use App\Repositories\RepositoryInterface\BaseRepositoryInterface;
use App\Repositories\PublisherRepository;
use App\Repositories\RepositoryInterface\PublisherRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return voi
     */
    public function register()
    {
       $this->app->bind(BaseRepositoryInterface::class, AuthorRepository::class);
       $this->app->bind(PublisherRepositoryInterface::class, PublisherRepository::class);
        
    }
}
