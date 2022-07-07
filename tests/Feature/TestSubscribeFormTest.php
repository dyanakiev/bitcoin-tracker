<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestSubscribeFormTest extends TestCase {
    use RefreshDatabase;

    /**
     * Test success subscribe form submission
     *
     * @return void
     */
    public function test_successful_subscribe() {
        $response = $this->post(route('subscribe'), [
            'email' => 'test@example.com',
            'target_price' => '20.000'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test unsuccessful subscribe form submission
     *
     * @return void
     */
    public function test_unsuccessful_subscribe() {
        $response = $this->post(route('subscribe'), [
            'email' => 'test123',
            'target_price' => '20.000'
        ]);

        $response->assertStatus(302);
    }
}
