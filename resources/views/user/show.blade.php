{{ $user->name }} <br>
{{ $user->email }} <br>
Vartotojo uzsakymu kiekis: {{ $user->orders->count() }} <br>
<br>
@foreach($user->orders as $order)
    {{ $order->reference_number }}
    Orderio visa suma {{ $order->items->sum('price') }}
    Daiktu kiekis uzsakyme {{ $order->items->count() }}
    <br>
@endforeach
<br>

<a href="{{ route('user.edit', $user->id) }}">Redaguoti</a>
<form method="POST" action="{{ route('user.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Trinti</button>
</form>

<br>

@foreach($user->items as $item)
    {{ $item->name }} -
    {{ $item->price }}
    <br>
@endforeach
