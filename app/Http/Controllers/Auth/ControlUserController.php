<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\PasswordExpiredRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ControlUserController extends Controller
{


    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function expired()
    {
        return view('auth.passwords.expired');
    }

    public function locked()
    {
        return view('auth.locked');
    }

    public function postExpired(PasswordExpiredRequest $request)
    {
        //valida que la contraseña nueva no sea igual a la anterior
        if ($request->current_password === $request->password) {
            return redirect()->back()->withErrors(['password' => 'New password is same to current password']);
        }

        //valida si la contraseña actual es correcta
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
        }

        $request->user()->update([
            'password' => bcrypt($request->password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back()->with(['status' => 'Password changed successfully']);
    }
}
