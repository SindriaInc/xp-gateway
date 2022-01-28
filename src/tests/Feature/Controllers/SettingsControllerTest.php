<?php

namespace Tests\Unit;

use Illuminate\Http\UploadedFile;
use Tests\DatabaseTestCase;
use Tests\MigrateFreshSeedOnce;

class SettingsControllerTest extends DatabaseTestCase
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
    public function shouldShowSettingsList(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/api/v1/settings');
        $response->assertStatus(200);
        //$response->assertViewIs('admin.settings.index');
    }

    public function shouldEditSettings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post('/api/v1/settings', ['sub' => 0]);

        $response->assertStatus(302);
        $response->assertSessionHas('success_message');
        $this->assertEquals(0, \App\Models\Setting::find(1)->value);
    }
}
