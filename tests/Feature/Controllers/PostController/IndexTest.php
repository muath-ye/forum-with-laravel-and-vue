<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->component('Posts/Index', true)
        );
});

it('passes posts to the view', function () {
    // Create 'hasResource' on 'AssertableInertia' class using macro.
    AssertableInertia::macro('hasResource', function (string $key, JsonResource $resource) {
        $assertableInertia = $this->toArray();
        $props = $assertableInertia['props'];

        $compiledResource = $resource->response()->getData(true);

        expect($props)
            ->toHaveKey($key, message: "Key \"{$key}\" not passed as a property to Inertia.")
            ->and($props[$key])
            ->toEqual($compiledResource);

        return $this;
    });

    // Create 'hasPaginatedResource' on 'AssertableInertia' class using macro.
    AssertableInertia::macro('hasPaginatedResource', function (string $key, ResourceCollection $resource) {
        $assertableInertia = $this->toArray();
        $props = $assertableInertia['props'];

        $compiledResource = $resource->response()->getData(true);

        expect($props)
            ->toHaveKey($key, message: "Key \"{$key}\" not passed as a property to Inertia.")
            ->and($props[$key])
            // ->dd() // to check the pagination data.
            ->toHaveKeys(['data', 'links', 'meta']) // this is enough to check if the pagination data is passed.
            ->data
            ->toEqual($compiledResource);

        return $this;
    });

    // I've create as much data as required for the test, and no more.
    // Because it takes time to actually build those models...
    $posts = Post::factory(3)->create();

    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->hasResource('post', PostResource::make($posts->first()))
            ->hasPaginatedResource('posts', PostResource::collection($posts->reverse()))
        );
});

// خالد الشمعةة تخصص اقمار صناعية لمعالجة الصور بما يخدم الزراعة
//ايكارديا
