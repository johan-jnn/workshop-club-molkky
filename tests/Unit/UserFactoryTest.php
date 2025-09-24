<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase
{
    /**
     * Test la génération d'un User par la factory.
     */
    public function test_user_factory_creates_valid_user(): void
    {
        $factory = new \Database\Factories\UserFactory;
        $userData = $factory->definition();
        $this->assertArrayHasKey('first_name', $userData);
        $this->assertArrayHasKey('email', $userData);
        $this->assertArrayHasKey('role', $userData);
        $this->assertNotEmpty($userData['password']);
    }
}
