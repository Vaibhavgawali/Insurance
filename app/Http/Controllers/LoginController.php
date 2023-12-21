<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Session;

use Auth;
use Validator;

class LoginController extends Controller
{
    /**
     * Login user.
     */
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if($validator->fails()){

            return Response(['status'=>false,'errors' => $validator->errors()],422);
        }
   
        if(Auth::attempt($request->all())){

            $user = Auth::user(); 

            if($user->isLoginAllowed){
                // $success =  $user->createToken('My_Insurance_Token')->plainTextToken;
                 $success="ok";
                 return Response(['status'=>true,'message'=>'User logged successfully','token' => $success,'redirect_url'=>'/dashboard'],200);
            }
            return Response(['status'=>false,'message'=>'Unauthorized'],401);
        }
        return Response(['status'=>false,'message' => 'email or password wrong'],401);
    }

    /**
    * Logout user.
    */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            Session::flush();
            // $user = Auth::user();
            // $user->currentAccessToken()->delete();
            // return Response(['data' => 'User Logout successfully.'],200);

        return redirect('/login');
        }
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
