<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_be_created_from_seed()
    {
        $this->seed(\UserSeeder::class);

        $this->assertCount(1, User::all());
        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com',
        ]);
    }
}
