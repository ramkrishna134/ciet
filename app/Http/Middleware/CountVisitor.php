<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        if (Visitor::where('date', today())->where('ip', $ip)->where('url', $_SERVER['REQUEST_URI'])->count() < 1)
        {
            Visitor::create([
                'url' => $_SERVER['REQUEST_URI'],
                'date' => today(),
                'ip' => $ip,
            ]);
        }
        return $next($request);
    }
}
