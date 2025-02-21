<?php

namespace Tests\Feature\Word;

use App\Models\User;
use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_delete_word(): void {
        $user = User::factory()->create();
        $word = Word::factory()->create();
        $this->assertDatabaseHas('words', ['id' => $word->id]);
        $response = $this->actingAs($user)->delete('words/'.$word->id);
        $response->assertRedirect('words');
        $this->assertDatabaseMissing('words',['id' => $word->id]);
    }
}
