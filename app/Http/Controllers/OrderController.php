<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OrderController extends Controller
{
    public function create(): View
    {
        return view('order.create', [
            'users' => User::all(),
        ]);
    }

    public function store(OrderStoreRequest $request): RedirectResponse
    {
        $order = Order::create($request->validated());

        Item::factory()->count(rand(10, 15))->create([
            'order_id' => $order->id,
        ]);

        return redirect()->route('order.index');
    }

    public function index(): View
    {
        return view('order.index', [
            'orders' => Order::all(),
        ]);
    }

    public function show(Order $order): View
    {
        $order->load('items.order', 'items.order.user');
        return view('order.show', [
            'order' => $order,
        ]);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->items()->delete();
        $order->delete();
        return redirect()->route('order.index');
    }

    public function edit(Order $order): View
    {
        $users = User::all();
        return view('order.edit', compact('order', 'users'));
    }

    public function update(OrderUpdateRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return redirect()->route('order.edit', $order->id);
    }
}
