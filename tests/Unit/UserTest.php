<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_register(): void

    {

        $response = $this->postJson('/api/users', ['name' => 'Sally']);

 

        $response

            ->assertStatus(200)

            ->assertJson([

                'created' => true,

            ]);

    }
}
