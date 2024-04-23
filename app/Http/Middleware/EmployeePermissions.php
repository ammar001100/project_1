<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmployeePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role , $permission)
    {
        if($role == 'employee'){

            if(Auth::user()->permissions->$permission == 0){
                return Redirect()->back();
            }
        }
            if($role == 'product'){
    
                if(Auth::user()->permissions->$permission == 0){
                    return Redirect()->back();
                }
            }
            if($role == 'section'){
    
                if(Auth::user()->permissions->$permission == 0){
                    return Redirect()->back();
                }
            }
            if($role == 'order'){
    
                if(Auth::user()->permissions->$permission == 0){
                    return Redirect()->back();
                }
            }
            if($role == 'stock'){
    
                if(Auth::user()->permissions->$permission == 0){
                    return Redirect()->back();
                }
            }
            if($role == 'report'){
    
                if(Auth::user()->permissions->$permission == 0){
                    return Redirect()->back();
                }
            }
    
            return $next($request);
    }
}
