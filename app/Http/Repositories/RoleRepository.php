<?php

namespace App\Http\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RoleRepository
{
    public function all(): Collection
    {
        return Role::all();
    }

    public function create(Request $request): Role
    {
        return Role::create($request->only(['name', 'role']));
    }

    public function update(Request $request, Role $role): bool
    {
        return $role->update($request->only(['name', 'role']));
    }

    public function syncResources(Role $role, array $resources): void
    {
        $role->resources()->sync($resources);
    }

    public function delete(Role $role): void
    {
        $role->users->each(function ($user) {
            $user->role_id = null;
            $user->save();
        });

        $role->delete();
    }

    public function detachResources(Role $role): void
    {
        $role->resources()->detach();
    }
}
