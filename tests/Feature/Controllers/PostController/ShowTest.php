<?php

use App\Models\Post;
use Inertia\Testing\AssertableInertia;

it('can show a post', function () {
    $post = Post::factory()->create();

    get(route('posts.show', $post))
        ->assertInertia(fn (AssertableInertia $assertableInertia) => $assertableInertia->component('Post/Show', true));
});