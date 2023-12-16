<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;
use App\Models\UserExperience;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');

        // Spatie middleware here
        $this->middleware(['role:Superadmin'])->only('index','update','destroy','trashed_users','restore_user','force_delete','assignRole');
        $this->middleware(['role_or_permission:Superadmin|view_user_details|view_candidate_details'])->only('show');
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $users = User::all();

            if ($users) {
                return Response(['data' => $users], 200);
            }
            return Response(['message' => "Users not found "], 404);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::check()) {

            $userId = User::find($id);
            if ($userId) {
                $user=Auth::user();
                if($user->hasPermissionTo('view_candidate_details')){
                    $users = User::with('address', 'profile', 'experience', 'documents')->find($userId);
                    return Response(['user' => $users], 200);
                }
                $userData = User::with('address', 'profile', 'experience', 'documents')->find($userId);
                return Response(['user' => $userData], 200);
            }
            return Response(['message' => 'User not found'], 401);
        }
        return Response(['data' => 'Unauthorized'], 401);
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
        if(Auth::check()){
            $formMethod = $request->method();
            if($formMethod == "PATCH"){
                $validator=Validator::make($request->all(),[
                    'isLoginAllowed'=>'required|boolean',
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
    public function destroy(string $id)
    {
        if (Auth::check()) {
            $userId = User::find($id);
            if ($userId) {
                $isTrashed = $userId->delete();
                if ($isTrashed) {
                    return Response(['message' => "User trashed successfully"], 200);
                }
                return Response(['message' => "Something went wrong"], 500);
            }
            return Response(['message' => "User not found "], 404);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    /**
     * List of Soft deleted user
     */
    public function trashed_users():Response
    {
        if (Auth::check()) {
            $users = User::onlyTrashed()->get();
            if($users){
                return Response(['message' => "Users trashed","users"=>$users],200);
            }  
            return Response(['message'=>"Users not found in trashed "],404);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    /**
     * Restore Soft deleted user
     */
    public function restore_user(string $id)
    {
        if (Auth::check()) {
            $user = User::onlyTrashed()->find($id);
            if($user){
                $isRestored = $user->restore();
                if($isRestored){
                    return Response(['message' => "User restored successfully"],200);
                }
                return Response(['message' => "Something went wrong"],500);
            }
            return Response(['message'=>"User not found in trashed"],404);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

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

    /**
     * Assign Role to user
     */
    public function assignRole(Request $request,$user_id) : Response
    {
        $validator=Validator::make($request->all(),['role'=>'required|in:Superadmin,Candidate,Insurer,Institute,Other']);

        if($validator->fails()){
            return Response(['message' => $validator->errors()],401);
        }

        $new_role=$request->role;

        $user=User::find($user_id);
        if($user){
            $role = $user->hasRole($new_role); /** check user has this role */ 

            if(!$role){
                $roles = $user->getRoleNames(); /** get all roles of user */

                $user->syncRoles([]); /** remove all previous roles */

                $user->assignRole($new_role); /** assign new role to user */

                return Response(['user'=>$user,'message'=>"Role assigned"],200);//'role'=>$user->getRoleNames(),
            }
           
            $permissions = $user->permissions;
            
            return Response(['user'=>$user,'role'=>$role,'permissions'=>$permissions,'message'=>"Role assigned"],200);
        }
        else{
            return Response(['message'=>"User not found"],404);
        }
    }
}
