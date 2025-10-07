<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role == $role) {
            return $next($request);
        }
        // return redirect('admin/super')->withErrors('Anda Tidak Memiliki Akses');
        return back()->withErrors('Anda Tidak Memiliki Akses');
        // return response()->json([
        //     'message' => 'Anda Tidak Memiliki Akses'
        // ], 403);
    }
}
