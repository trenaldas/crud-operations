{{ $user->name }} <br>
{{ $user->email }} <br>
<a href="{{ route('user.edit', $user->id) }}">Redaguoti</a>
<form method="POST" action="{{ route('user.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Trinti</button>
</form>
