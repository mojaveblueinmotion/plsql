<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTesting extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testValidInput()
    {
        $response = $this->json('POST', '/api/akar-kuadrat', ['number' => 25]);

        $response->assertStatus(200)
                 ->assertJson(['result' => [['hasil' => 5.0]]]);
    }

    /**
     * Test the hitungAkarKuadrat function with a number exceeding the threshold.
     *
     * @return void
     */
    public function testInvalidInput()
    {
        $response = $this->json('POST', '/api/akar-kuadrat', ['number' => 350000000000000000000000000000000]);

        $response->assertStatus(400)
                 ->assertJson(['error' => 'Angka Tidak Boleh Negatif']);
    }
}
