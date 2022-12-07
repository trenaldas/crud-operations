@if(session('message'))
    {{ session('message') }}
@endif
<form method="POST" action="{{ route('order.update', $order->id) }}">
    @method('PUT')
    @csrf
    <input type="text" name="reference_number" placeholder="Uzsakymo numeris" value="{{ old('reference_number') ?? $order->reference_number }}"><br>
    @error('reference_number')
        {{ $message }}
    @enderror
    <select name="user_id" id="user_id">
        @foreach($users as $user)
            <option @if(old('user_id') ?? $order->user_id === $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Atnaujinti</button>
</form>
