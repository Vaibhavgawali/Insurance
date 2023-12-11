<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Validator;

class LoginController extends Controller
{
    /**
     * Login user.
     */
    public function loginUser(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if($validator->fails()){

            return Response(['message' => $validator->errors()],401);
        }
   
        if(Auth::attempt($request->all())){

            $user = Auth::user(); 
    
            $success =  $user->createToken('MyApp')->plainTextToken; 
        
            return Response(['token' => $success],200);
        }

        return Response(['message' => 'email or password wrong'],401);
    }

    /**
    * Logout user.
    */
    public function logout(): Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
        
        return Response(['data' => 'User Logout successfully.'],200);
    }

    /**
    * Refresh Token
    */
    public function refreshAuthToken()
    {
        $user = Auth::user();

        // Revoke the current token
        $user->currentAccessToken()->delete();

        // Issue a new token
        $newToken = $user->createToken('new-token-name')->plainTextToken;

        return Response(['access_token' => $newToken],200);
    }
}
