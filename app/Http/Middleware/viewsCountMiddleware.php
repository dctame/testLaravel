<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class viewsCountMiddleware
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
        $ip = $request->ip();
        $id = $request->route()->id;

        if (empty(Redis::get($ip.'to-id'.$id))) {
            Redis::set($ip.'to-id'.$id, 1, 'EX', 604800);
            if (empty(Redis::get('NewsItem-'.$id.'-UnicUsers'))) {
                Redis::set('NewsItem-'.$id.'-UnicUsers', 1);
            }else{
                Redis::incr('NewsItem-'.$id.'-UnicUsers');
            }
        }
        if (empty(Redis::get('NewsItem-views-'.$id))) {
            Redis::set('NewsItem-views-'.$id, 1);
        }else{
            Redis::incr('NewsItem-views-'.$id);
        }

        return $next($request);
    }
}
