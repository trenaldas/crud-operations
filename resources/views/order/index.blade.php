<table style="width:100%">
    <tr>
        <th>Ref numeris</th>
        <th>Vartotojas</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td><a href="{{ route('order.show', $order->id) }}">{{ $order->reference_number }}</a></td>
        <td>{{ $order->user->name }}</td>
    </tr>
    @endforeach
</table>

