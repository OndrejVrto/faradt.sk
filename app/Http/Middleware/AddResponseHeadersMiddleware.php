<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class AddResponseHeadersMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next) {

        $response = $next($request)
            ->header('Content-Language', config('app.faker_locale'))
            ->header('X-XSS-Protection', '1; mode=block')
            ->header('X-Download-Options', 'noopen')
            ->header('X-Frame-Options', 'SAMEORIGIN')
            ->header('X-Content-Type-Options', 'nosniff')
            ->header('X-Powered-By', 'Aplikaciu vytvoril Ondrej Vrto')
            ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains')
            ->header('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->header('Feature-Policy', "microphone 'none'; camera 'none'; geolocation 'none';");

            if (Cache::has('LAST_MODIFIED')) {
                $modifiedSince = $request->headers->get('If-Modified-Since');

                if ($modifiedSince && Cache::get('LAST_MODIFIED') <= strtotime($modifiedSince)) {
                    $response->setStatusCode(Response::HTTP_NOT_MODIFIED);
                } else {
                    $response->header('Last-Modified', gmdate("D, d M Y H:i:s", Cache::get('LAST_MODIFIED'))." GMT");
                }
            }

            return $response;
    }
}
