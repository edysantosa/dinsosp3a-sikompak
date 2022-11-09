<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest  extends TestCase
{
    public function test_unauthenticated_user_redirected_to_login_page()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/auth/login');
        $response->assertLocation('/auth/login');
    }

    public function test_user_can_login_using_the_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/auth/login', [
            'email' =>  $user->email,
            'password' =>  'password',
        ]);
        $response->assertRedirect('/');
        
        $this->assertAuthenticated();
    }

    public function test_user_can_not_access_admin_page()
    {
        $user = User::factory()->create();

        $this->post('/auth/login', [
            'email' =>  $user->email,
            'password' =>  'password',
        ]);

        $response = $this->get('/admin/users');
        $response->assertStatus(404);
    }

    public function test_admin_can_access_admin_page()
    {
        $user = User::factory()->create();
        $user->roles()->attach(\App\Models\Role::where('name', 'admin')->first()->value('id'));

        $this->post('/auth/login', [
            'email' =>  $user->email,
            'password' =>  'password',
        ]);

        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertSee('Tambah User');
    }
}
