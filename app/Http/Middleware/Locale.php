<?php
namespace App\Http\Middleware;
use Closure;
use App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route('locale')){
            App::setLocale($request->route('locale') ?? "en");

            session(['locale' => $request->route('locale') ?? "en"]);
        }else{
            App::setLocale(session('locale',
                'en'));
        }

        return $next($request);
    }
}