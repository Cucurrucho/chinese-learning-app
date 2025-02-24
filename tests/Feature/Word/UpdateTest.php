<?php

namespace Tests\Feature\Word;

use App\Models\User;
use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase {
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void {
        $user = User::factory()->create();
        $word = Word::factory()->create();
        $response = $this->actingAs($user)->patch('words/' . $word->id, [
            'hanzi' => '很',
            'pinyin' => 'hen',
            'meaning' => 'am (for adjective)'
        ]);
        $response->assertRedirect('words');
        $this->assertDatabaseHas('words', [
            'id' => $word->id,
            'hanzi' => '很',
            'pinyin' => 'hen',
            'meaning' => 'am (for adjective)']);
    }
}
