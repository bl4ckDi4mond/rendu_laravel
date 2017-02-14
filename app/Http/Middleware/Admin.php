<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{

    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Accès non autorisé, vous ne disposez pas des droits suffisants', 401);
            } else {
                return redirect()->guest('/login');
            }
        } else {
            if ($this->auth->user()->is_admin == 1) {
                die('is admin');
            } else {
                die('not admin');
            }
        }
        return $next($request);
    }
}
