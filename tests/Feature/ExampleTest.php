<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function basicTest()
    {//問題なくhttp通信でのGETリクエストが問題なく行われているかどうかをテストしている。
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
