<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class checkCode
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
        $verifyuser = User::where('code',$request->code )->first();
        // dd($verifyuser);
        if(is_null($verifyuser) && isset($request->code)){
                return response()->json(['message' => 'your code is not correct']);
        }

        return $next($request);
    }
}
