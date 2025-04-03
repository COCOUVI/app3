<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;

class TrustVercelProxies
{
    public function handle(Request $request, Closure $next): Response
    {
        // Configuration des headers à prendre en compte
        $trustedHeaders = SymfonyRequest::HEADER_X_FORWARDED_FOR
            | SymfonyRequest::HEADER_X_FORWARDED_HOST
            | SymfonyRequest::HEADER_X_FORWARDED_PORT
            | SymfonyRequest::HEADER_X_FORWARDED_PROTO
            | SymfonyRequest::HEADER_X_FORWARDED_PREFIX;

        // Liste des proxies Vercel officiels (à jour 2024)
        $request->setTrustedProxies(
            [
                '127.0.0.1',
                '::1',
                '169.254.1.1', // IPs Vercel
                '76.76.21.0/24',
                '147.182.128.0/24'
            ],
            $trustedHeaders
        );

        return $next($request);
    }
}