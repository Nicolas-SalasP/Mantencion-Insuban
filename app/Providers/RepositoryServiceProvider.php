<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Repositories\Interfaces\SucursalRepositoryInterface;
use App\Repositories\Interfaces\InsumoRepositoryInterface;

use App\Repositories\ClienteRepository;
use App\Repositories\SucursalRepository;
use App\Repositories\InsumoRepository;

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

        $this->app->bind(
            InsumoRepositoryInterface::class,
            InsumoRepository::class
        );
    }

    public function boot(): void
    {
    }
}