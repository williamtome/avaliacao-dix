<?php

namespace App\Http\Controllers;

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
        return view('role.create', [
            'resources' => Resource::all()
        ]);
    }

    public function edit(Role $role): View
    {
        return view('role.edit', [
            'role' => $role,
            'resource' => Resource::all(),
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
