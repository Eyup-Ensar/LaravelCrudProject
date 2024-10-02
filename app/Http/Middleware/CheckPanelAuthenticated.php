<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPanelAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
   // Kullanıcı panel oturumu açmışsa, login sayfasına yönlendirme
        if (Auth::guard('panel')->check()) {
            return $next($request);
        }

        return redirect()->route('panel.loginForm'); 
    }
}
