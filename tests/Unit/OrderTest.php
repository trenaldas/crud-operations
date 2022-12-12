<?php

namespace Tests\Unit;

use App\Models\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testFormattedPriceReturnsCorrectValue(): void
    {
        $order = new Order();
        $order->user_id = 1;
        $order->total_price = 200;
        $order->reference_number = '999aaa';

        $this->assertEquals(2.00, $order->formatted_price);
    }
}
