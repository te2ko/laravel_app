<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function indexTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
