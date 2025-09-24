<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserReservationTest extends TestCase
{
    /**
     * Test la relation reservations sur le modèle User.
     */
    public function test_user_has_reservations_relation(): void
    {
        $user = new \App\Models\User;
        $this->assertTrue(method_exists($user, 'reservations'));
    }
}
