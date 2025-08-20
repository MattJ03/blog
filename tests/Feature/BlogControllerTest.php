<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\BlogController;
use Database\Factories\BlogFactory;
use App\Models\Blog;
use App\Services\BlogService;
use App\Models\User;
use App\Services\Log;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase;

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

        $response->assertJsonPath('data.0.title', $blogs->first()->title);
        $response->assertJsonPath('data.0.body', $blogs->first()->body);
    }

    public function test_create_blog() {
        $data = [
          'title' => 'Fake title',
          'body' => 'Fake body about a fake blog in a fake site',
          'category' => 'Fake', 
          'user_id' => User::factory(),
        ];

        $response = $this->postJson('api/store/blogs', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('blogs', [
          'title' => 'Fake title',
        ]);

    }
}
