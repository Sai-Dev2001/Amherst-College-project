<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that an admin can create a new user.
     */
    public function test_admin_can_create_user()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->post('/users', [
            'name' => 'Test User',
            'email' => 'testuser@mail.com',
            'password' => 'testpass',
            'bio' => 'This is a test user bio.',
            'is_admin' => false,
        ]);

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('users', ['email' => 'testuser@mail.com']);
    }

    /**
     * Test that a regular user cannot access admin functions.
     */
    public function test_regular_user_cannot_access_admin_functions()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);

        $response = $this->get('/users/create');
        $response->assertStatus(403);

        $adminUser = User::factory()->create(['is_admin' => true]);
        $response = $this->delete('/users/' . $adminUser->id);
        $response->assertStatus(403);
    }

    /**
     * Test that a regular user can edit their own profile.
     */
    public function test_regular_user_can_edit_own_profile()
    {
        $user = User::factory()->create(['is_admin' => false]); 
        $this->actingAs($user)
            ->put(route('users.update', $user), [
                'name' => 'Updated Name',
                'email' => $user->email,
            ])
            ->assertRedirect('/users');

        $user->refresh();

        $this->assertEquals('Updated Name', $user->name);

        $this->assertNotTrue($user->is_admin);
        
        $this->assertEquals(0, $user->is_admin);
    }

    /**
     * Test validation errors are correctly handled during user creation.
     */
    public function test_validation_errors_on_user_creation()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->post('/users', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'bio' => 'This is a test user bio.',
            'is_admin' => false,
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertDatabaseMissing('users', ['email' => 'invalid-email']);
    }

    /**
     * Test that the dashboard correctly displays users in a card style.
     */
    public function test_dashboard_displays_users_correctly()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->get('/users');
        $response->assertStatus(200);

        $users = User::all();
    }
}