<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Models\Blog;
use App\Services\BlogService;


class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_correct_creds() {

        $password = 'notarealpassword';
        $user = User::factory()->create([
            'email' => 'real@gmail.com',
            'password' => Hash::make($password),
            'is_Admin' => true,
        ]);

        $response = $this->postJson('api/login', [
            'email' => 'real@gmail.com',
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'token',
        ]);
    }

    public function test_login_fail_wrong_creds() {
        $password = 'arealpassword';
        $user = User::Factory()->create([
            'email' => 'correctemail@gmail.com',
            'password' => bcrypt($password),
            'is_Admin' => true,
        ]);

        $response = $this->postJson('api/login', [
            'email' => 'realemail1@gmail.com',
            'password' => $password,
        ]);

        $response->assertStatus(401);
        $response->assertExactJsonStructure([
            'message',
        ]);
    }
  public function test_logout_works()
    {
        $user = User::factory()->create([
            'is_Admin' => true,
        ]);

        // Create a real token for the user
        $token = $user->createToken('TestToken')->plainTextToken;

        // Logout using the token
        $logout = $this->withHeader('Authorization', "Bearer $token")
                       ->postJson('api/logout');

        $logout->assertStatus(200)
               ->assertJson(['message' => 'user logged out']);
    }
    
}
