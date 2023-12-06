<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\TestResponse;
use Inertia\Testing\AssertableInertia;

class TestingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (! $this->app->runningUnitTests()) {
            return;
        }

        // Create 'hasResource' on 'AssertableInertia' class using macro.
        AssertableInertia::macro('hasResource', function (string $key, JsonResource $resource) {
            $this->has($key);
            expect($this->prop($key))->toEqual($resource->response()->getData(true));

            return $this;
        });

        // Create 'hasPaginatedResource' on 'AssertableInertia' class using macro.
        AssertableInertia::macro('hasPaginatedResource', function (string $key, ResourceCollection $resource) {
            $this->has($key);
            expect($this->prop($key))
                ->toHaveKeys(['data', 'links', 'meta']) // this is enough to check if the pagination data is passed.
                ->data
                ->toEqual($resource->response()->getData(true));

            return $this;
        });

        TestResponse::macro('assertHasResource', function (string $key, JsonResource $resource) {
            return $this->assertInertia(fn (AssertableInertia $inertia) => $inertia->hasResource($key, $resource));
        });

        TestResponse::macro('assertHasPaginatedResource', function (string $key, ResourceCollection $resource) {
            return $this->assertInertia(fn (AssertableInertia $inertia) => $inertia->hasPaginatedResource($key, $resource));
        });
    }
}
