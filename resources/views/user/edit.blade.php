@if(session('message'))
    {{ session('message') }}
@endif
<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="Vardas" value="{{ old('name') ?? $user->name }}"><br>
    @error('name')
        {{ $message }}
    @enderror
    <input type="email" name="email" placeholder="El. paštas" value="{{ old('email') ?? $user->email }}"><br>
    @error('email')
        {{ $message }}
    @enderror
    <button type="submit">Išsaugoti</button>
</form>