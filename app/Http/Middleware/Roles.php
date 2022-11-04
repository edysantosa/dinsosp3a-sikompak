<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Roles
{
    /**
     * Middleware untuk setting gate berdasarkan role yang ada, pass parameter nama-nama gate yang bisa melewati middleware ini.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$allowedGates)
    {
        // if (Gate::allows('is-admin')) {
        //     return $next($request);
        // }
        // // return redirect('/');

        if (Gate::any($allowedGates)) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
