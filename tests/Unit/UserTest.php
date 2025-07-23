<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_register(): void
    {
        $response = $this->postJson('/api/users/register', [
            'display_name' => 'Lolo le zozo',
            'username' => 'nadrojria',
            'email' => 'miso_maven@umamifarm.net',
            'password' => 'pickle123',
            'created_at' => now(),
            'updated_at' => now()]
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->whereAllType([
            'token' => 'string',
            'Type' => 'string'
        ])
);
    }
    }
//     public function test_authenticate_user(): void
//     {
//         $user = User::factory()->create();

//         $response = $this->actingAs($user)
//             ->assertTrue($user->isAuthenticate());
//     }
// }