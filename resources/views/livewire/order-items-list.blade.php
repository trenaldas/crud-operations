<div>
    @foreach($order->items as $item)
        {{ $item->name }}
        {{ $order->reference_number }}
        {{ $order->user->name }}
        <span style="cursor: pointer" wire:click="deleteItem({{ $item->id }})">Trinti</span>
        <br>
    @endforeach
    <input wire:model="name" type="text" placeholder="Vardas">
    <input wire:model="price" type="number" placeholder="Kaina">
    <button wire:click="addItem">Prideti</button>
</div>
