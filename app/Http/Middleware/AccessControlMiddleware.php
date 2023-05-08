<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {

        $ignoreResources = config('acl.ignore_resources');
        $routeName = $request->route()->getName();

        if (auth()->user()->role->role === 'ROLE_ADMIN') {
            $this->setRoleResources($ignoreResources);
        }

        if (!in_array($routeName, $ignoreResources)) {
            $this->authorize($routeName);
        }

        return $next($request);
    }

    private function setRoleResources(array &$resources): void
    {
        $roleResources = [
            'role.index',
            'role.create',
            'role.edit',
            'role.store',
            'role.update',
        ];

        foreach ($roleResources as $resource) {
            $resources[] = $resource;
        }
    }
}
