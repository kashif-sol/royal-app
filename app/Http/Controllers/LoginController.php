<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {   
        $response =  Http::withOptions(['verify' => false])->post('https://symfony-skeleton.q-tests.com/api/v2/token', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        $data = $response->json();
        
        if(isset($data['status']))
        {
            return redirect()->back()->withErrors(['error' => 'There was an error processing your request.' , "message" => 'There was an error processing your request.']);
        }

         
        Session::put('token_key', $data['token_key']);
        Session::put('user_name', $data['user']['first_name']);
        Session::put('user_email', $data['user']['email']);
     
         
        return redirect('/');
        
    }
}
