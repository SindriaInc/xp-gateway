<?php

namespace Tests\Unit;

use Tests\DatabaseTestCase;
use Tests\MigrateFreshSeedOnce;

class LoginControllerTest extends DatabaseTestCase
{
    use MigrateFreshSeedOnce;

    /**
     * A basic test example.
     *
     * @test
     */
    public function shouldShowLoginForm(): void
    {
//        $response = $this->get('/login');
//        $response->assertStatus(200);
//        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function shouldLoginAdminUser(): void
    {
//        $response = $this->post('/login', [
//            'email' => 'test.admin@example.org',
//            'password' => 'secret',
//        ]);
//
//        $response->assertStatus(302);
//        $response->assertRedirect('/admin');
    }
}
