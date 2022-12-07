@if(session('message'))
    {{ session('message') }}
@endif
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Vardas" value="{{ old('name') }}"><br>
    @error('name')
        {{ $message }}
    @enderror
    <input type="email" name="email" placeholder="El. paštas" value="{{ old('email') }}"><br>
    @error('email')
        {{ $message }}
    @enderror
    <input type="password" name="password"><br>
    <button type="submit">Išsaugoti</button>
</form>
