<?php

namespace App\Http\Controllers\Dashboard\Api\Auth;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class SupplierTokenController extends Controller
{
    public function store(Request $request) {
        if($request->authenticate()){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DASHBOARD_ADMIN);
        }
        return redirect()->back()->withErrors(['name'=>(trans('dashboard/auth.failed'))]);
        /*if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }*/
        
    }
}
