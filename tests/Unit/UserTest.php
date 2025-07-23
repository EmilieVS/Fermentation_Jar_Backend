<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_register(): void
    {
        $response = $this->postJson('/api/users', [
            'display_name' => 'Lolo le zozo',
            'username' => 'nadrojria',
            'email' => 'miso_maven@umamifarm.net',
            'password' => 'pickle123',
            'created_at' => now(),
            'updated_at' => now()]
        );

        $response

            ->assertStatus(200)

            ->assertJson([
                'created' => true,
            ]);

    }
    public function test_authenticate_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->assertTrue($user->isAuthenticate());
    }
}