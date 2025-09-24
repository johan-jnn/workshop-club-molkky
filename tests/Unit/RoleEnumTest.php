<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RoleEnumTest extends TestCase
{
    /**
     * Test les valeurs de l'enum Role.
     */
    public function test_enum_values(): void
    {
        $this->assertEquals(0, \App\Enums\Role::USER->value);
        $this->assertEquals(1, \App\Enums\Role::CONTRIBUTOR->value);
        $this->assertEquals(2, \App\Enums\Role::ADMINISTRATOR->value);
    }
}
