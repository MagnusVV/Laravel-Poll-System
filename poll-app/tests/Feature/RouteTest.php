<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_routes(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
