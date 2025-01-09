<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class AuthenticateController extends Controller
{
    public function index(){
        return view('backend.auth.login');
    }

    public function login(request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);    

        $authenticated = Auth::guard('web')->attempt($request->only(['email', 'password']));
        if($authenticated)
        {
            Session::put('user_id', auth()->user()->id);
            return redirect()->route('backend.dashboard');
        }
        else
        {
            return redirect()->back()->withErrors(['invalid_credential' => 'Credential is invalid!']);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('backend.login');
    }    
}
