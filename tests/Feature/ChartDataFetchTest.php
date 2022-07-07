<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChartDataFetchTest extends TestCase {
    use RefreshDatabase;

    /**
     * Test successful chart data fetch
     *
     * @return void
     */
    public function test_successful_fetch() {
        $response = $this->get(route('chartData'));

        $response->assertStatus(200);
    }

}
