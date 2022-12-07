<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        return view('user.index', [
            'user' => User::all(),
        ]);
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
        ]);

//        User::create($request->validated());
        return redirect()->route('user.create')
            ->with('message', 'Vartotojas sekmingai sukurtas');
    }

    public function show(User $user): View
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('user.edit', $user->id)
            ->with('message', 'Vartotojas sekmingai atnaujintas');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
