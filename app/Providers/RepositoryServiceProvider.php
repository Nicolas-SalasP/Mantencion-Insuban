<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Repositories\Interfaces\SucursalRepositoryInterface;

use App\Repositories\ClienteRepository;
use App\Repositories\SucursalRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ClienteRepositoryInterface::class,
            ClienteRepository::class
        );

        $this->app->bind(
            SucursalRepositoryInterface::class,
            SucursalRepository::class
        );
    }

    public function boot(): void
    {
    }
}