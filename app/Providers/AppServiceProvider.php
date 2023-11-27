<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
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
        JsonResource::withoutWrapping();

        if (config('app.prevent_lazy_loading')) {
            \Illuminate\Database\Eloquent\Model::preventLazyLoading();
        }

        if (config('app.should_be_strict')) {
            \Illuminate\Database\Eloquent\Model::shouldBeStrict();
        }
    }
}
