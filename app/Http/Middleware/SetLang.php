<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLang
{

//    public function handle(Request $request, Closure $next): Response
//    {
//        $lang = session('lang', 'ru');
//        App::setLocale($lang);
//        $languages = ['ru', 'en'];
//        if (in_array($request->segment(1), $languages)) {
//            session(['lang' => $request->segment(1)]);
//            return redirect('/');
//        }
//        return $next($request);
//    }
    public function handle(Request $request, Closure $next): Response
    {
        $languages = ['ru', 'en', 'uz'];
        $lang = session('lang', 'ru');
        if (in_array($request->segment(1), $languages)) {
            session(['lang' => $request->segment(1)]);
            App::setLocale($request->segment(1));
            return $next($request);
        }


        App::setLocale($lang);
        return $next($request);
    }

//    public function handle(Request $request, Closure $next)
//    {
//        $languages = ['ru', 'en'];
//        $lang = session('lang', 'ru'); // Sessiyadan tilni olish
//        App::setLocale($lang); // Ilovaning tilini o'rnatish
//
//        // Agar URLning birinchi segmentida til ko'rsatilmagan bo'lsa
//        if (!in_array($request->segment(1), $languages)) {
//            return redirect($lang . '/' . $request->path()); // Tilni URL'ga qo'shib redirect
//        }
//
//        return $next($request);
//    }

}
