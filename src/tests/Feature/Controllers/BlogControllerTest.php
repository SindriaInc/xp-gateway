<?php

namespace Tests\Unit;

use Illuminate\Http\UploadedFile;
use Tests\DatabaseTestCase;
use Tests\MigrateFreshSeedOnce;

class BlogControllerTest extends DatabaseTestCase
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
    public function shouldShowArticlesList(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/articles');
        $response->assertStatus(200);
        //$response->assertViewIs('admin.articles.index');
    }

    /**
     * @test
     */
    public function shouldCreateNewArticle(): void
    {
        $response = $this->actingAs($this->adminUser)->post('/admin/articles/store', [
            'title' => 'A title',
            'description' => '<b>Description</b>b',
            'cover' => UploadedFile::fake()->create('test.png', 1000),
            'attachment' => UploadedFile::fake()->create('test.pdf', 3000),
            'category_id' => 1,
            'user_id' => $this->adminUser->id,
        ]);

        $response->assertStatus(302);
        //$response->assertRedirect('/admin/articles');
    }
}
