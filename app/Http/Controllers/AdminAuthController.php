<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class AdminAuthController extends Controller
{
    // For Auth Admin
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
            return view('adminAuth.login');
    }

    public function submit(Request $request)
   {
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|min:6',

        ]);
        
        if(Auth::guard('admin')->attempt(
            [ 
                'email' => $request->email, 
                'password' => $request->password
            ], 

            $request->remember)){

            return redirect()->route('admin.dashboard');
            // ->intended(route('admin.dashboard'));
            
        }
        return redirect()
                ->back()
                ->withInput(Input::except('password'))
                ->with('error' , 'Email or password is worng');
   }

}
