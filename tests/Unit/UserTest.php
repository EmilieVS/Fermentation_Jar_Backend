<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // Test case 1 : Successful registration
    public function test_register(): void
    {
        $response = $this->postJson(
            '/api/users',
            [
                'display_name' => 'Clem',
                'username' => 'fitz_assassin',
                'email' => 'kefir_aficionada@umamifarm.net',
                'password' => 'tepache69',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->whereAllType([
                    'token' => 'string',
                    'Type' => 'string'
                ])
            );
    }

    // Test case 2 : Unsucessful registration if the required fields are not filled
    public function test_register_fails_with_missing_required_fields(): void
    {
        $response = $this->postJson('/api/users', []);

        $response
            ->assertStatus(422) // Standard validation error for Laravel
            ->assertJsonValidationErrors(['display_name', 'username', 'email', 'password']);
    }


    // Test case 3 : Unsuccessful registration if the username chosen is already taken
    public function test_register_fails_with_duplicate_username(): void
    {
        // Create a user with this username
        User::factory()->create(['username' => 'fitz_assassin']);

        $response = $this->postJson(
            '/api/users',
            [
                'display_name' => 'Clem',
                'username' => 'fitz_assassin', // Already existing username in our DB
                'email' => 'kefir_aficionada@umamifarm.net',
                'password' => 'tepache69',
            ]
        );

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['username']);
    }

    // Test case 4 : The user can't access their profile's info if they are not logged in

    public function test_getUserData(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('api/users')
            ->assertStatus(200);
        
    }
    
    // Test case 5 : The user can edit their profile's info if they are logged in
  
    public function test_editProfile(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->put('api/users', [
                "display_name"=> "FinalTest",
                "email"=> "miso_test@umamifarm.net",
                "password"=> "confirmedTest"
            ])
            ->assertStatus(200);
        }
    }