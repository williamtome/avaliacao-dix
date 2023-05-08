<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(User $model): View
    {
        return view('users.index', [
            'users' => $model->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->role),
            'role_id' => $request->role,
        ]);

        return redirect()->route('user.index')
            ->withStatus('Usuário criado com sucesso.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
        ]);

        return redirect()->route('user.index', $user)
            ->withStatus('Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index', $user)
            ->withStatus('Usuário removido com sucesso.');
    }
}
