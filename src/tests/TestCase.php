<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function tearDown(): void
    {
        // Clean files
        \Storage::deleteDirectory('/files');
        \Storage::deleteDirectory('/photos');
        parent::tearDown();
    }
}
