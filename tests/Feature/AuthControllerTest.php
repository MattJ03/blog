<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;


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
}
