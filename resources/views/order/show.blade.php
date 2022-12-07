{{ $order->reference_number }} <br>
{{ $order->user->name }} <br>
<a href="{{ route('order.edit', $order->id) }}">Redaguoti</a>
<form method="POST" action="{{ route('order.destroy', $order->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Trinti</button>
</form>
