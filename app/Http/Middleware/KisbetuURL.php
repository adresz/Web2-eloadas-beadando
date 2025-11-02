<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KisbetuURL
{
    public function handle($request, Closure $next)
    {
        $path = $request->getPathInfo();

        if ($path !== strtolower($path)) {
            return redirect(strtolower($path), 301);
        }

        return $next($request);
    }

}
