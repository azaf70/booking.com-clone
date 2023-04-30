<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_fails_with_admin_role()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'confirm_password',
            'password_confirmation' => 'confirm_password',
            'role_id' => Role::ROLE_ADMIN
        ]);

        $response->assertStatus(422);
    }

    public function test_registration_succeeds_with_owner_role()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'confirm_password',
            'password_confirmation' => 'confirm_password',
            'role_id' => Role::ROLE_OWNER
        ]);

        $response->assertStatus(422);
    }

    public function test_registration_succeeds_with_user_role()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'confirm_password',
            'password_confirmation' => 'confirm_password',
            'role_id' => Role::ROLE_USER
        ]);

        $response->assertStatus(422);
    }
}
