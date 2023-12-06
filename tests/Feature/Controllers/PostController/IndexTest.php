<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Testing\TestResponse;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->component('Posts/Index', true)
        );
});

it('passes posts to the view', function () {
    // I've create as much data as required for the test, and no more.
    // Because it takes time to actually build those models...
    $posts = Post::factory(3)->create();

    TestResponse::macro('assertHasResource', function (string $key, JsonResource $resource) {
        return $this->assertInertia(fn (AssertableInertia $inertia) => $inertia->hasResource($key, $resource));
    });

    get(route('posts.index'))
        ->assertHasResource('post', PostResource::make($posts->first()))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            // ->hasResource('post', PostResource::make($posts->first()))
            ->hasPaginatedResource('posts', PostResource::collection($posts->reverse()))
        );
});
