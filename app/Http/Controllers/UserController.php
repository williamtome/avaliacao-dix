<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(User $model): View
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        // TODO: Adicionar campo de permissão que o admin escolheu para este novo usuário!
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index')
            ->withStatus('Usuário criado com sucesso.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        // TODO: Adicionar campo de permissão que o admin escolheu para este novo usuário!
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('user.edit', $user)
            ->withStatus('Usuário atualizado com sucesso.');
    }
}
