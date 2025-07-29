<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\TestResponse;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponseAssert as PHPUnit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    // Test case 1 : Successful post
    public function test_createPost(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/api/post',
            [
                'description' => 'Ceci est une description qui fait plus de 20 caractères.',
            ])
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->whereAllType([
                    'message' => 'string',
                    'data' => 'array',
                ])
            );
        }

    // Test case 2 : The user can access their posts
    public function test_getUserPost(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/api/user/post')
            ->assertStatus(200);
    }
    
    // Test case 3 : The user can see all posts unauthenticated
    public function test_getAllPosts(): void
    {
        $response = $this->getJson('/api/post');

        $response->assertStatus(200)
             ->assertJsonStructure([ // To use assertJsonStructure() we have to get the Json first
                 'post' => [
                     '*' => [
                         'description',
                         'display_name',
                         'username',
                         'created_at'
                     ]
                 ]
             ]);
    }
}