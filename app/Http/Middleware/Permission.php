<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

use App\Exceptions\PermissionException;
class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle($request, Closure $next, $permission = null, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);
        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        $permission = $request->route()->getName();
        // dd($permission);
        return ($authGuard->user()->hasRole('Super Admin')  || $authGuard->user()->haspermission($permission) ? $next($request)  :  throw UnauthorizedException::forPermissions(explode(",",$permission)));

    }
}
