<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return the correct component', function () {
    get(route('posts.index'))
        ->assertComponent('Posts/Index', true);
});

it('passes posts to the view', function () {
    // I've create as much data as required for the test, and no more.
    // Because it takes time to actually build those models...
    $posts = Post::factory(3)->create();
    $posts->load('user');

    get(route('posts.index'))
        ->assertHasPaginatedResource('posts', PostResource::collection($posts->reverse()));
});
