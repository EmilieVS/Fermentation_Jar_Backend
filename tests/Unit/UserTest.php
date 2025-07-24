<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
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

    // public function test_getUserData(): void
    // {
    //     $response = $this->postJson(
    //         '/api/users',
    //         [
    //             'display_name' => 'Lolo le zozo',
    //             'username' => 'nadrojria',
    //             'email' => 'miso_maven@umamifarm.net',
    //             'password' => 'pickle123',
    //             'created_at' => now(),
    //             'updated_at' => now()
    //         ]
    //     );

    //     $response
    //         ->assertStatus(200)
    //         ->assertJson(
    //             fn(AssertableJson $json) =>
    //             $json->whereAllType([
    //                 'token' => 'string',
    //                 'Type' => 'string'
    //             ])
    //         );
    // }

    public function test_getUserData(): void
    {
        $user = User::factory()->create();
 
        $response = $this->actingAs($user)  
            ->withSession(['banned' => false])
            ->get('api/users')
            ->assertStatus(200);

    }
}