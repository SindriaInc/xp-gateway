<?php

namespace Tests;

use DB;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class DatabaseTestCase extends BaseTestCase
{
    use CreatesApplication, MigrateFreshSeedOnce;

    public function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    protected function getAdminUser(): \App\Models\User
    {
        return \App\Models\User::query()->where('email', '=', 'test.admin@example.org')->first();
    }
}
