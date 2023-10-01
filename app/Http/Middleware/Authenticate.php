<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->routeis('user.*')) {
                return route('user.user_login');
            }
            if ($request->routeis('owner.*')) {
                return route('owner.owner_login');
            }
            if ($request->routeis('admin.*')) {
                return route('admin.admin_login');
            }
        }
    }
}
