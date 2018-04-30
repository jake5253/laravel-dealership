<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Type;
use App\Services;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View()->composer('layouts.app', function ($view) {
            $types = Type::all();
            $services = Services::all();

            $view->with('types', $types)
                ->with('services', $services);
        });
    }
}
