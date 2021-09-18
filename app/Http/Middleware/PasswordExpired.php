<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class PasswordExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //, $type
    {
        $user = $request->user();
        $password_changed_at = new Carbon($user->password_changed_at);

        if (Carbon::now()->diffInDays($password_changed_at) >= config('auth.password_expires_days')) { //&& $type=="expired"
            return  redirect()->route('password.expired');
        }

        return $next($request);
    }
    //codigo tomado de https://laraveldaily.com/password-expired-force-change-password-every-30-days/#:~:text=Add%20timestamp%20field%20%E2%80%9Cpassword_changed_at%E2%80%9D%20to,was%20unchanged%20in%20X%20days)
}
