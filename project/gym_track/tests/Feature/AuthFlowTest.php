<?php

namespace Tests\Feature;

use App\Livewire\Login;
use App\Livewire\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed roles as they are needed for registration
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
    }

    public function test_can_register_new_user()
    {
        Livewire::test(Register::class)
            ->set('username', 'newuser')
            ->set('password', 'password123')
            ->set('password_confirmation', 'password123')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::where('username', 'newuser')->exists());
        $user = User::where('username', 'newuser')->first();
        $this->assertTrue($user->hasRole('user'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_can_login_user()
    {
        $user = User::create([
            'username' => 'existinguser',
            'password' => 'password123', // Model casts should hash this, but wait. 
            // In unit tests, factories or create() usually trigger casts. 
            // However, verify if 'password' => 'hashed' cast works on create(). 
            // Yes it should.
        ]);

        // Ensure user has role if needed (though login usually doesn't check role unless middleware enforces it)
        $user->assignRole('user');

        Livewire::test(Login::class)
            ->set('username', 'existinguser')
            ->set('password', 'password123')
            ->call('login')
            ->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    public function test_cannot_login_with_bad_credentials()
    {
        $user = User::create([
            'username' => 'existinguser',
            'password' => 'password123',
        ]);

        Livewire::test(Login::class)
            ->set('username', 'existinguser')
            ->set('password', 'wrongpassword')
            ->call('login')
            ->assertHasErrors('username');

        $this->assertGuest();
    }
}
