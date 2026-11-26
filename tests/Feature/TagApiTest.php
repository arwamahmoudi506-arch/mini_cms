<?php

use App\Models\Post;
use App\Models\Tag;

it('lists the tags with their published post count', function () {
    $tag = Tag::factory()->create();
    Post::factory()->published()->count(2)->create()->each(fn (Post $post) => $post->tags()->attach($tag));
    Post::factory()->create()->tags()->attach($tag);

    $this->getJson('/api/tags')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonStructure([
            'data' => ['*' => ['id', 'name', 'slug', 'posts_count']],
        ])
        ->assertJsonPath('data.0.slug', $tag->slug)
        ->assertJsonPath('data.0.posts_count', 2);
});

it('shows a single tag', function () {
    $tag = Tag::factory()->create();

    $this->getJson('/api/tags/'.$tag->id)
        ->assertOk()
        ->assertJsonPath('data.slug', $tag->slug)
        ->assertJsonPath('data.posts_count', 0);
});

it('returns a JSON 404 for an unknown tag', function () {
    $this->getJson('/api/tags/999999')
        ->assertNotFound()
        ->assertJsonStructure(['message']);
});

it('filters the posts by tag slug', function () {
    $tag = Tag::factory()->create();
    $tagged = Post::factory()->published()->create(['title' => 'Avec le tag']);
    Post::factory()->published()->create(['title' => 'Sans le tag']);
    $tagged->tags()->attach($tag);

    $this->getJson('/api/posts?tag='.$tag->slug)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $tagged->id)
        ->assertJsonPath('data.0.title', 'Avec le tag');
});

it('rejects an unknown tag slug in the filter', function () {
    $this->getJson('/api/posts?tag=inexistant')
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['tag']);
});
