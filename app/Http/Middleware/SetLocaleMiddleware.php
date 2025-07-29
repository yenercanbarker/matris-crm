<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    protected array $supportedLocales = ['tr', 'en', 'es', 'de', 'fr', 'pt', 'ru'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($request->lang) && in_array($request->lang, $this->supportedLocales)) {
            App::setLocale($request->lang);
        } else if (session()->has('language') && in_array(session('language'), $this->supportedLocales)) {
            App::setLocale(session('language'));
        }

        return $next($request);
    }
}
