<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
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
        Order::create($request->validated());

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
        return view('order.show', [
            'order' => $order,
        ]);
    }

    public function destroy(Order $order): RedirectResponse
    {
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
