<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function authenticate(Request $request)
    {
        
        $request->validate([
            'email' => [
                'required',
                'string',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ],
        ]);

        $credentials = $request->only('email', 'password');

        if ($user = Auth::attempt($credentials)) {

            // generate user token and return plain text token
            $token = $request->user()->createToken(
                $request->user()->name,
                []
            )
            ->plainTextToken;
            
            // return  authenticated user json response with the generated token
            return collect(
                $request->user()
            )
            ->put('token', $token)
            ->only('name', 'email', 'token');
        }

        // return json response if authentication failed
        return response()->json([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
