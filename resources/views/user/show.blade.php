{{ $user->name }} <br>
{{ $user->email }} <br>
Vartotojo uzsakymu kiekis: {{ $user->orders->count() }} <br>
<br>
@foreach($user->orders as $order)
    {{ $order->reference_number }} <br>
@endforeach

<a href="{{ route('user.edit', $user->id) }}">Redaguoti</a>
<form method="POST" action="{{ route('user.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Trinti</button>
</form>
