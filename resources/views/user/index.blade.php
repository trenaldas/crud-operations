<table style="width:100%">
    <tr>
        <th>Vardas</th>
        <th>El. pastas</th>
    </tr>
    @foreach($user as $user)
    <tr>
        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    </tr>
    @endforeach
</table>

