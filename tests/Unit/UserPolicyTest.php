<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserPolicyTest extends TestCase
{
    /**
     * Test la méthode viewAny de UserPolicy.
     */
    public function test_view_any_contributor(): void
    {
        $user = new \App\Models\User([
            'role' => \App\Enums\Role::CONTRIBUTOR,
        ]);
        $policy = new \App\Policies\UserPolicy();
        $this->assertTrue($policy->viewAny($user));
    }
}
