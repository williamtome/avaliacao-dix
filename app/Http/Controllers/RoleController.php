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

    public function store(RoleRequest $request): View
    {

    }

    public function edit(Role $role): View
    {
        return view('role.edit', [
            'role' => $role,
            'resources' => Resource::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->update(['name' => $request->name]);
        $role->resources()->sync($request->resources);

        return redirect()->route('role.index');
    }
}
