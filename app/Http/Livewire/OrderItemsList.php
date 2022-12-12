<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Order;
use Livewire\Component;

class OrderItemsList extends Component
{
    public Order $order;

    public string $name = '';
    public string|int $price = '';

    public function deleteItem(int $id): void
    {
        Item::whereId($id)->delete();
        $this->order->load('items');
        $this->emit('countChanged', $this->order->items()->count());
    }

    public function addItem(): void
    {
        $this->order->items()->create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->order->load('items');
        $this->reset('name', 'price');

        $this->emit('countChanged', $this->order->items()->count());
    }

    public function render()
    {
        return view('livewire.order-items-list');
    }
}
