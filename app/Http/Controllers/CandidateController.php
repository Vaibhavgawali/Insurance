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
use App\Models\UserExperience;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');

        // Apply Spatie middleware here
        // $this->middleware('can:edit posts')->only(['edit', 'update']);
        // $this->middleware('can:delete posts')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    // public function index() // permission->view_all_users
    // {
    //     if (Auth::check()) {
    //         $users=User::all();

    //         if($users){
    //             return Response(['data' => $users],200);
    //         }
    //         return Response(['message'=>"Users not found "],404);
    //     }

    //     return Response(['data' => 'Unauthorized'],401);
    // }

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
    public function store(Request $request): Response 
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
            'experience' => 'required|in:experienced,fresher', //start and end date
            'ctc' => 'required_if:experience,experienced',
            'organization' => 'required_if:experience,experienced',
            'designation' => 'required_if:experience,experienced',
            "joining_date"=>'required_if:experience,experienced|date_format:Y-m-d',
            "relieving_date"=>'required_if:experience,experienced|date_format:Y-m-d',
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
                'preffered_line'=>$request->preferred_line,
            ]);

            $user_address=UserAddress::create([
                'user_id'=>$user_id,
                'city'=>$request->city,
            ]);
            
            if($request->experience == "experienced"){
                $user_experience=UserExperience::create([
                    'user_id'=>$user_id,
                    'organization'=>$request->current_org,
                    'designation'=>$request->current_role,
                    'ctc'=>$request->current_ctc,
                    "joining_date"=>$request->joining_date,
                    "relieving_date"=>$request->relieving_date
                ]);
            }   

            event(new Registered($user));
            // if($user->sendEmailVerificationNotification()){
            //     return Response(['message' => "Email is sent to email"],200);
            // }

            // $user->assignRole('candidate'); /** assign role to user */
            return Response(['message' => "User created successfully"],200);
        }
        return Response(['message' => "Something went wrong"],500);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : Response // self 
    {
        $userId = Auth::user()->user_id; 

        if($userId == $id){
            $userData = User::with('address', 'profile', 'experience','documents')->find($userId);
            return Response(['user'=>$userData],200);
        } 
        return Response(['message'=>'Unauthorized'],401);
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
        $userId = Auth::user()->user_id; 
        if($userId == $id){
            $formMethod = $request->method();
            if($formMethod == "PATCH"){
                $validator=Validator::make($request->all(),[
                    'name'=>'required|string',
                    // 'email'=>'required|email|unique:users,email',
                    'phone'=>'required|numeric|digits:10'
                ]);

                if($validator->fails()){
                    return Response(['message' => $validator->errors()],401);
                }   

                $user = User::where('user_id', $id);
                if($user){
                    $isUpdated=$user->update($request->all());
                    if($isUpdated){
                        return Response(['message' => "User updated successfully"],200);
                    }
                    return Response(['message' => "Something went wrong"],500);
                }                    
                return Response(['message'=>"User not found"],404);
            }
            return Response(['message'=>"Invalid form method "],405);
        }
        return Response(['message'=>'Unauthorized'],401);
    }

    /**
     * Soft delete user
     */
    // public function destroy(string $id) 
    // {
    //     $user = User::where('user_id', $id) ;
    //     if($user){
    //         $isTrashed=$user->delete();
    //         if($isTrashed){
    //             return Response(['message' => "User trashed successfully"],200);
    //         }
    //         return Response(['message' => "Something went wrong"],500);
    //     }  
    //     return Response(['message'=>"User not found "],404);
    // }

    
     /**
     * List of Soft deleted user
     */
    // public function trashed_users():Response
    // {
    //     $users = User::onlyTrashed();
    //     if($user){
    //         return Response(['message' => "Users trashed","users"=>$users],200);
    //     }  
    //     return Response(['message'=>"Users not found in trashed "],404);
    // }

    /**
     * Restore Soft deleted user
     */
    // public function restore_user(string $id)
    // {
    //     $user = User::onlyTrashed()->where('user_id', $id) ;
    //     dd($user);
    //     if($user){
    //         $isRestored = $user->restore();
    //         if($isRestored){
    //             return Response(['message' => "User restored successfully"],200);
    //         }
    //         return Response(['message' => "Something went wrong"],500);
    //     }
    //     return Response(['message'=>"User not found in trashed"],404);
    // }

    /**
     * Hard delete user this require to join tables experience ,user_profile ,documents,address
     */
    // public function force_delete(string $id)
    // {
    //     $user = User::onlyTrashed()->where('user_id', $id) ;
    //     if($user){
    //         $isDeleted = $user->forceDelete();
    //         if($isDeleted){
    //             return Response(['message' => "User deleted permantally"],200);
    //         }
    //         return Response(['message' => "Something went wrong"],500);
    //     }
    //     return Response(['message'=>"User not found in trashed"],404);
    // }

}
