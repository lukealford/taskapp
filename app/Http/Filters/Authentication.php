<?php namespace App\Http\Filters;
 
use Illuminate\Http\Request;
use Auth, Redirect, Response;
use Illuminate\Routing\Route; //required for $route parameter
 
class AuthFilter {
 
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function filter(Route $route,Request $request) // a little fix: $route parameter was missing.
    {
        if (Auth::guest())
        {
            if ($request->ajax())
            {
                return Response::make('Unauthorized', 401);
            }
            else
            {
                return Redirect::guest('/login');
            }
        }
    }
 
}