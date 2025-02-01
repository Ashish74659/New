<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrameHeadersMiddleware
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
     $response = $next($request);
    //  $response->header('X-Frame-Options', 'ALLOW FROM https://fdo-bidmate.kefify.com/');
     $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);
     $response->headers->set('X-XSS-Protection', '1; mode=block');
    // $response->headers->set('Content-Type','text/html; charset=UTF-8');
     $response->headers->set('Cache-Control', 'no-cache, must-revalidate');
     $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
     $response->headers->set('X-Content-Type-Options', 'nosniff');
     $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
     $response->headers->set('Content-Security-Policy', "upgrade-insecure-requests;block-all-mixed-content");
   
     return $response;
 }
}
