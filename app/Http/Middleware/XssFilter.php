<?php

namespace App\Http\Middleware;

use Closure;

class XssFilter 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            if($input != strip_tags($input)){
                $input = clean($input);
            } else {
                $input = $input;
            }
        });
        $request->merge($input);
        
        $response = $next($request);

        $response->headers->set('Strict-Transport-Security', 'max-age=2592000; includeSubDomains;');
        $response->headers->set('Content-Security-Policy', '');
        $response->headers->set('X-Frame-Options', 'max-age=2592000; includeSubDomains;');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Cache-Control', 'no-cache');
        
        return $response;
    }
}
