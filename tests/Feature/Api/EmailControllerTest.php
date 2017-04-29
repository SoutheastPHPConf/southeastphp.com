<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEndpoint()
    {
        $response = $this->get('/email');

        $response->assertStatus('200');
    }
}
