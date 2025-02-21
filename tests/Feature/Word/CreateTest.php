<?php

namespace Tests\Feature\Word;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_render_create_page(): void {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/words/create');

        $response->assertStatus(200);
    }
}
