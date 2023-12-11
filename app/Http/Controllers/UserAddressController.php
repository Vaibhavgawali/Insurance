<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;

use App\Models\UserAddress;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = UserAddress::where('user_id', $id);
        if($user){
            $userData=$user->get();
            return Response(['user address'=>$userData],200);
        }
        return Response(['message'=>"User not found"],404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formMethod = $request->method();
        if($formMethod == "PATCH"){
            $validator=Validator::make($request->all(),[
                "line1"=> 'string|max:40',
                "line2"=> 'string|max:40',
                "line3"=> 'string|max:40',
                "city"=> 'required|string|max:30',
                "state"=> 'string|max:20',
                "pincode"=> 'numeric|digits:6',
                "country"=> 'string|max:20',
            ]);

            if($validator->fails()){
                return Response(['message' => $validator->errors()],401);
            }   

            $user = UserAddress::where('user_id', $id) ;
            if($user){
                $isUpdated=$user->update($request->all());
                if($isUpdated){
                    return Response(['message' => "User address updated successfully"],200);
                }
                return Response(['message' => "Something went wrong"],500);
            }                    
            return Response(['message'=>"User not found"],404);
        }
        return Response(['message'=>"Invalid form method "],405);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
