<?php

namespace Tests\Feature\Word;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_store_word(): void {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/words', [
            'hanzi' => '很',
            'pinyin' => 'hen',
            'meaning' => 'am (for adjective)'
        ]);
        $response->assertRedirect('/words');
        $this->assertDatabaseHas('words', [
            'hanzi' => '很',
            'pinyin' => 'hen',
            'meaning' => 'am (for adjective)'
        ]);
    }
}
