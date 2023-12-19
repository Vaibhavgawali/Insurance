<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\EmailVerified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;

class InsurerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');
        $this->middleware(['role:Superadmin'])->only('index');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $users = User::role('Insurer')->get();
            if ($users) {
                return Response(['data' => $users], 200);
            }
            return Response(['message' => "Users with role Insurer not found "], 404);
        }

        return Response(['data' => 'Unauthorized'], 401);
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
        $validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric|digits:10',
            'password'=>[
                        'required',
                        Password::min(8)
                                ->mixedCase()
                                ->numbers()
                                ->symbols()
            ],
            'spoc'=>'required|string|max:60',
            'preferred_line'=>'required|string|max:60',
            'city'=>'required|string|max:60'
        ]);

        if($validator->fails()){
            return Response(['message' => $validator->errors()],401);
        }   

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password, //Hash::make($request->password),
            'phone'=>$request->phone
        ]);

        if($user){
            $user_id=$user->user_id;

            $user_profile=UserProfile::create([
                'user_id'=>$user_id,
                'spoc'=>$request->spoc,
                'preffered_line'=>$request->preferred_line,
            ]);

            $user_address=UserAddress::create([
                'user_id'=>$user_id,
                'city'=>$request->city,
            ]);
            
            event(new Registered($user));
            // if($user->sendEmailVerificationNotification()){
            //     return Response(['message' => "Email is sent to email"],200);
            // }

            $user->assignRole('insurer'); /** assign role to user */
            return Response(['message' => "User created successfully"],200);
        }
        return Response(['message' => "Something went wrong"],500);
        
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $user = User::find($userId);

    //     if($user){
    //          $userData = User::with('address','profile')->find($userId);

    //         return Response(['user'=>$userData],200);
    //     }
    //     else{
    //         return Response(['message'=>"User not found"],404);
    //     }
    // }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
