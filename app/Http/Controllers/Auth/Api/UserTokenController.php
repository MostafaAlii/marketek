<?php
namespace App\Http\Controllers\Auth\Api;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class UserTokenController extends Controller {
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }
    }
}
