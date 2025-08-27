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
         $user = User::factory()->create();
         $this->actingAs($user, 'sanctum');
      
        $blog = Blog::factory()->create();
           
        $response = $this->getJson('/api/blogs');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => $blog->title,
        ]);
    }

    public function test_index_multiple_entries() {
       $user = User::factory()->create();
       $this->actingAs($user, 'sanctum');
       
        $blogs = Blog::factory()->count(5)->create();

        $response = $this->getJson('api/blogs');
        $response->assertStatus(200);

        $response->assertJsonPath('data.0.title', $blogs->first()->title);
        $response->assertJsonPath('data.0.body', $blogs->first()->body);
    }

    public function test_create_blog() {
      $user = User::factory()->create();
      $this->actingAs($user, 'sanctum');
        $data = [
          'title' => 'Fake title',
          'body' => 'Fake body about a fake blog in a fake site',
          'category' => 'Fake', 
          'user_id' => User::factory(),
        ];


        $response = $this->postJson('api/blogs', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('blogs', [
          'title' => 'Fake title',
        ]);

    }

    public function test_blocked_missing() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $data = [
        'title' => 'Blog title here',
        'body' => '',
        ];

        $response = $this->postJson('api/blogs', $data);

        $response->assertStatus(422);
        $this->assertDatabaseMissing('blogs', [
            'title' => 'Blog title here',
        ]);
    }

    public function test_need_title() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $data = [
            'title' => '',
            'body' => 'hi',
        ];

        $response = $this->postJson('api/blogs', $data);
        $response->assertStatus(422);
        $this->assertDatabaseMissing('blogs', [
            'body' => 'hi',
        ]);
    }

    public function test_accepts_category() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $data = [
        'title' => 'I love Anto',
        'body' => 'Hes a loyal friend!',
        'category' => 'Friendship',
        ];

        $response = $this->postJson('api/blogs', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('blogs', [
            'title' => 'I love Anto',
        ]);
    }

    public function test_category_can_nullable() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $data = [
         'title' => 'Adam is bro',
         'body' => 'Possibly',
         'category' => '',
        ];

        $response = $this->postJson('api/blogs', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('blogs', [
          'title' => 'Adam is bro',
          
        ]);
    }

    public function test_returns_output() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $dataAgain = [
            'title' => 'Ravens win Superbowl',
             'body' => 'Will never happen',
        ];

        $response = $this->postJson('api/blogs', $dataAgain);
        $response->assertStatus(201)
        ->assertJson([
           'data' => $dataAgain,
        ]);
    }

    public function test_update_blog() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
       $blog = Blog::factory()->create();

       $data = [
        'title' => 'new title',
        'body' => 'body of new title',
       ];

        $response = $this->putJson("api/blogs/{$blog->id}", $data);
        $response->assertStatus(200);
    }

    public function test_update_fail_on_no_title() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $blog = Blog::factory()->create();

        $data = [
            'title' => '',
            'body' => 'ba dum tiss',
        ];

        $response = $this->putJson("api/blogs/{$blog->id}", $data);
        $response->assertStatus(422);
    }

    public function test_delete_blog() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $blog = Blog::factory()->create();

        $response = $this->delete("api/blogs/{$blog->id}");
        $response->assertStatus(200);
    }

    public function test_cant_delete_blog_not_exist() {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
          $response = $this->postJson('api/delete');
          $response->assertStatus(404);
    }
}
