<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BotUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample1()
    {
        $response = $this->post('api/register',
        [
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => 'test'
        ]);

        $response->assertStatus(200);
    }

    public function testExample2()
    {
        $response = $this->post('api/register',
            [
                'name' => 'Test%%8181!!#_\'',
                'email' => 'tes122t@test.com',
                'password' => 'test'
            ]);

        $response->assertStatus(200);
    }
}
