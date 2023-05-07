<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Resource;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('role.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create(): View
    {
        $resources = Resource::all();
        $userResources = $resources->filter(function ($value, $key) {
            if (str_contains($value, 'users')) {
                return $value;
            }
        });

        $newsResources = $resources->filter(function ($value, $key) {
            if (str_contains($value, 'news')) {
                return $value;
            }
        });

        return view('role.create', [
            'userResources' => $userResources,
            'newsResources' => $newsResources,
        ]);
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $role = Role::create([
            'name' => $request->name,
            'role' => $request->role,
        ]);

        $role->resources()->sync($request->permissions);

        return redirect()->route('role.index')
            ->withSuccess('Papel criado com sucesso.');
    }

    public function edit(Role $role): View
    {
        $resources = Resource::all();
        $userResources = $resources->filter(function ($value, $key) {
            if (str_contains($value, 'users')) {
                return $value;
            }
        });

        $newsResources = $resources->filter(function ($value, $key) {
            if (str_contains($value, 'news')) {
                return $value;
            }
        });

        return view('role.edit', [
            'role' => $role,
            'userResources' => $userResources,
            'newsResources' => $newsResources,
        ]);
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $role->update([
            'name' => $request->name,
            'role' => $request->role,
        ]);

        $role->resources()->sync($request->resources);

        return redirect()->route('role.index')
            ->withSuccess('Papel atualizado com sucesso.');
    }
}
