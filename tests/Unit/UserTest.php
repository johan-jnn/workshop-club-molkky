<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * Test la création d'un utilisateur et la vérification des attributs.
     */
    public function test_can_create_user(): void
    {
        $user = new \App\Models\User([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertNotEmpty($user->password);
    }
}
