<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseMigrations;

    public function testOrderValidationFails(): void
    {
        User::factory()->create();

        $response = $this
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post('/order',
            [
                'user_id' => 1,
                'reference_number' => 'asd',
            ],
        )
            ->assertJsonValidationErrors([
                'reference_number' => ['The reference number field is required.'],
                'user_id' => ['The user id field is required.'],
            ]);
    }
}
