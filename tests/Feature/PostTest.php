<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
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
        
        // Test case 2 : Unsucessful post if there are less than 20 characters
        public function test_post_fails_if_not_enougth_characters(): void
        {
            $user = User::factory()->create();
    
            $response = $this->actingAs($user)
                ->withSession(['banned' => false])
                ->post('/api/post',
                [
                    'description' => 'Trop court.',
                ])
                ->assertStatus(404);            
    }


    // Test case 3 : Unsucessful post if there are more than 300 characters
    // public function test_post_fails_if_too_much_characters(): void
    // {
       
    // }

    // Test case 4 : The user can access their posts
    // public function test_getUserPost(): void
    // {
        
    // }
    
    // Test case 5 : The user can see all posts
    // public function test_getAllPosts(): void
    // {
        
    // }
    }