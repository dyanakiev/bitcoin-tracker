<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CronTest extends TestCase {
    use RefreshDatabase;

    /**
     * Test cron
     *
     * @return void
     */
    public function test_cron() {
        $this->artisan('update:statistics:btc')->assertSuccessful();
    }

}
