<?php

namespace Tests\Unit;

use Tests\DatabaseTestCase;
use Tests\MigrateFreshSeedOnce;

class SubscriberControllerTest extends DatabaseTestCase
{
    use MigrateFreshSeedOnce;

    private $adminUser;

    public function setUp(): void
    {
        parent::setUp();
        if ($this->adminUser === null) {
            $this->adminUser = $this->getAdminUser();
        }
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function shouldShowSubscribersList(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/api/v1/subscribers');
        $response->assertStatus(200);
        //$response->assertViewIs('admin.subscribers.index');
    }

    public function shouldStoreSubscriber(): void
    {
        $data = [
            'name' => 'Gino',
            'surname' => 'Pino',
            'birthday' => '1992-01-01',
            'email' => 'test@example.com',
            'phone' => '343333333',
            'fit' => '54712548',
            'club' => 'Random CLUB',
            'score_id' => '1',
            'category_id' => '1',
            'type_id' => '1',
        ];
        $response = $this->actingAs($this->adminUser)
            ->post('/api/v1/subscribers/store');
        $response->assertStatus(302);
        $response->assertSessionHas('success_message');
    }

    /** @test */
    public function shouldDeleteSubscriber(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post('/api/v1/subscribers/delete/1');
        $response->assertStatus(302);
        $response->assertSessionHas('success_message');
    }
}
