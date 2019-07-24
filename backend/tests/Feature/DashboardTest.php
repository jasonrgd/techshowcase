<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    /**
     * test to see if logged in user can access dashboard
     *
     * @return void
     */
    public function testCanViewDashboardOnLoginTest()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    /**
     * test to see if anonymous user is redirected
     */
    public function testCannotViewDashboardOnNoLoginTest()
    {
        $response = $this->get('/home');
        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }
}
