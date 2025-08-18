<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\BlogController;
use Database\Factories\BlogFactory;
use App\Models\Blog;

class BlogControllerTest extends TestCase
{

    public function test_index_returns_when_single_blog_in_database() {
        $blog = Blog::factory()->create();
   
        $response = $this->getJson('/api/index');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => $blog->title,
        ]);
    }

    public function test_index_multiple_entries() {
        $blogs = Blog::factory()->count(5)->create();

        $response = $this->getJson('api/index');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => $blogs->first()->title,
            'body' => $blogs->first()->body,
        ]);
    }
}
