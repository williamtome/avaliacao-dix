<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ResourceRepository;
use App\Http\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use App\Models\Resource;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(
        protected RoleRepository $roleRepository,
        protected ResourceRepository $resourceRepository,
    ) {}

    public function index(): View
    {
        return view('role.index', [
            'roles' => $this->roleRepository->all(),
        ]);
    }

    public function create(): View
    {
        $userResources = $this->resourceRepository->getUsers();
        $newsResources = $this->resourceRepository->getNews();

        return view('role.create', [
            'userResources' => $userResources,
            'newsResources' => $newsResources,
        ]);
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $role = $this->roleRepository->create($request);

        $role->resources()->sync($request->permissions);

        return redirect()->route('role.index')
            ->withSuccess('Papel criado com sucesso.');
    }

    public function edit(Role $role): View
    {
        $userResources = $this->resourceRepository->getUsers();
        $newsResources = $this->resourceRepository->getNews();

        return view('role.edit', [
            'role' => $role,
            'userResources' => $userResources,
            'newsResources' => $newsResources,
        ]);
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $this->roleRepository->update($request, $role);
        $this->roleRepository->syncResources($role, $request->permissions);

        return redirect()->route('role.index')
            ->withSuccess('Papel atualizado com sucesso.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $this->roleRepository->detachResources($role);
        $this->roleRepository->delete($role);

        return redirect()->route('role.index')
            ->withSuccess('Papel removido com sucesso.');
    }
}
