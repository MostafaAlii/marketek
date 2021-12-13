<?php
namespace App\Http\Middleware\Api;
use Closure;
use Illuminate\Http\Request;
class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   // Deafult Arabic Language
        app()->setLocale('ar');

        if(isset($request->lang) && $request->lang == 'en')
            app()->setLocale('en');

        if(isset($request->lang) && $request->lang == 'fr')
            app()->setLocale('fr');

        if(isset($request->lang) && $request->lang == 'it')
            app()->setLocale('it');

        if(isset($request->lang) && $request->lang == 'ru')
            app()->setLocale('ru');
            
        if(isset($request->lang) && $request->lang == 'es')
            app()->setLocale('es');
        return $next($request);
    }
}
