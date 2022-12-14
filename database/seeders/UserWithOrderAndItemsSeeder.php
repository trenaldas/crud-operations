<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserWithOrderAndItemsSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->has(
                Order::factory()
                ->hasItems(10)
                ->count(2)
            )
            ->create();
    }
}
