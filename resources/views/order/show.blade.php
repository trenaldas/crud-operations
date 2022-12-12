
{{--@foreach($order->items as $item)--}}
{{--    {{ $item->name }}--}}
{{--    {{ $item->order->reference_number }}--}}
{{--    {{ $item->order->user->name }}--}}
{{--    <br>--}}
{{--@endforeach--}}


<!DOCTYPE html>
<html>
<head>
    @livewireStyles
</head>
<body>

{{ $order->reference_number }} <br>
{{ $order->user->name }} <br>


@livewire('items-count', [
    'count' => $order->items->count(),
])
<a href="{{ route('order.edit', $order->id) }}">Redaguoti</a>
<form method="POST" action="{{ route('order.destroy', $order->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Trinti</button>
</form>

<br>

@livewire('order-items-list', [
    'order' => $order,
])

@livewireScripts
</body>
</html>
