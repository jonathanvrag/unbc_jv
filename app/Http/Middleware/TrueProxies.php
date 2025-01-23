<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Symfony\Component\HttpFoundation\Request;

class TrustProxies extends Middleware
{
    protected $proxies;

    protected $headers = Request::HEADER_X_FORWARDED_FOR;

    public function handle($request, \Closure $next)
    {
        if ($request->header('x-forwarded-proto') == 'https') {
            $request->server->set('HTTPS', true);
        }

        return $next($request);
    }
}
