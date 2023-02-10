<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->is_Admin($request)) {
            return $next($request);
        }

        return redirect('dashboard')->with('status', 'access-denied');
//        Auth::guard('web')->logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        abort(403);
    }

    protected function is_Admin(Request $request)
    {
        $user = $request->user();

        if ($user->role[0]['name'] === 'Administrator') {
            return true;
        }

        return false;
    }
}
