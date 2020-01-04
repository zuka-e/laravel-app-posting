<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Identify
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
        if ($request->user == Auth::user()) {
            return $next($request);
        } else {
            session()->flash('msg_type','danger');
            session()->flash('msg','不正なアクセスです');
            return redirect()->route('home');

        }
    }
}
