<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
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
        //
    }

    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user]);
    }
}
