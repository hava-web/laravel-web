<?php

namespace App\Http\Controllers\Auth ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Log the user out of the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();

    Session::flush();

    return redirect('login');
    }
}
