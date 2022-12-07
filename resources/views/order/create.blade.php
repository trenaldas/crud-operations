@if(session('message'))
    {{ session('message') }}
@endif
<form method="POST" action="{{ route('order.store') }}">
    @csrf
    <input type="text" name="reference_number" placeholder="Uzsakymo numeris" value="{{ old('reference_number') }}"><br>
    @error('reference_number')
        {{ $message }}
    @enderror
    <select name="user_id" id="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Išsaugoti</button>
</form>
