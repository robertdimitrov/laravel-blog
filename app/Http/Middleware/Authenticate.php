<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        $usersCount = User::count();
        $hasUsers = $usersCount > 0;
        $path = $request->path();

        // If there is no user data in the database, redirect to the
        // register page in order to set up an account. The app
        // is meant to be used as a personal blog, therefore 
        // only one user should be created.

        if (!$hasUsers && $path !== 'register')
        {
            return redirect('/register');
        }

        // If the database contains user data, but there is no active
        // session, redirect to the sign in page.

        if (!Auth::check())
        {
            $excludePaths = ['signin'];

            if (!$hasUsers)
            {
                $excludePaths[] = 'register';
            }

            if (!in_array($path, $excludePaths))
            {
                return redirect('/signin');
            } 
        }

        return $next($request);
    }
}
