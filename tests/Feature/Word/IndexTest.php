<?php

namespace Tests\Feature\Word;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/words');

        $response->assertStatus(200);
    }
}
