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

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {

        $ignoreResources = config('acl.ignore_resources');
        $routeName = $request->route()->getName();

        if (!in_array($routeName, $ignoreResources)) {
            $this->authorize($routeName);
        }

        return $next($request);
    }
}
