<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function store(Request $request)
    {
        // TODO: Adicionar campo de permissão que o admin escolheu para este novo usuário!
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

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
}
