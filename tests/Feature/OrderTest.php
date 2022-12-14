<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserWithOrderAndItemsSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseMigrations;

    public function testOrderValidationFails(): void
    {
        User::factory()->create();

        $response = $this->post('/order', [
            'user_id' => 1,
            'reference_number' => 'sho',
        ]);

        $response->assertSessionHasErrors([
            'reference_number' => 'The reference number must be at least 5 characters.',
        ])->assertRedirect();

        $this->post('/order', [
            'user_id' => 2,
            'reference_number' => 'ref-ref',
        ])
            ->assertSessionHasErrors([
                'user_id' => 'The selected user id is invalid.',
            ]);

        $this->post('/order')
            ->assertSessionHasErrors([
                'user_id' => 'The user id field is required.',
                'reference_number' => 'The reference number field is required.',
            ]);
    }

    public function testItCreatesAndDeletesNewOrder(): void
    {
        User::factory()->create();
        $this->assertDatabaseCount('orders', 0);

        $this->post('/order', [
            'user_id' => 1,
            'reference_number' => 'test-test',
        ])
            ->assertRedirectToRoute('order.index');

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', [
            'user_id' => 1,
            'reference_number' => 'test-test',
        ]);

        $this->delete('/order/1')
            ->assertRedirectToRoute('order.index');

        $this->assertDatabaseCount('orders', 0);
        $this->assertDatabaseCount('items', 0);
    }

    public function testUserShowPrintsAllItems(): void
    {
        $this->seed(UserWithOrderAndItemsSeeder::class);

        $user = User::first();

        $this->get('/user/1')
            ->assertSee($user->items()->first()->name)
            ->assertSee($user->items()->first()->price);
    }
}
