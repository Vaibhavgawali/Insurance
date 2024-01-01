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

        //  Spatie middleware here
        $this->middleware(['role_or_permission:Superadmin|view_candidate_list|view_users_list'])->only('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $users = User::role('Candidate')->get();
            if ($users) {
                // return Response(['data' => $users], 200);
                return view('dashboard.admin.candidate-list', ['candidates' => $users]);
            }
            return Response(['message' => "Users with role Candidate not found "], 404);
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
    public function store(Request $request): Response
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:10|regex:/^[6-9]\d{9}$/',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => 'required|same:password',
            'experience' => 'required|in:experienced,fresher', 
            'ctc' => 'required_if:experience,experienced',
            'organization' => 'required_if:experience,experienced',
            'designation' => 'required_if:experience,experienced',
            "joining_date" => 'required_if:experience,experienced',
            'preferred_line' => 'required|string|max:60',
            'city' => 'required|string|max:60'
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, //Hash::make($request->password),
            'phone' => $request->phone
        ]);

        if ($user) {
            $user_id = $user->user_id;

            $user_profile = UserProfile::create([
                'user_id' => $user_id,
                'preferred_line' => $request->preferred_line,
            ]);

            if ($request->experience == "experienced") {
                $user_address = UserAddress::create([
                    'user_id' => $user_id,
                    'city' => $request->city,
                ]);
            }

            if ($request->experience == "experienced") {
                $user_experience = UserExperience::create([
                    'user_id' => $user_id,
                    'organization' => $request->organization,
                    'designation' => $request->designation,
                    'ctc' => $request->ctc,
                    "joining_date" => $request->joining_date,
                    "relieving_date" => $request->relieving_date
                ]);
            }

            // event(new Registered($user));
            // if($user->sendEmailVerificationNotification()){
            //     return Response(['message' => "Email is sent to email"],200);
            // }

            /** assign role to user **/
            $user->assignRole('Candidate');
            return Response(['status' => true, 'message' => "Candidate created successfully"], 200);
        }
        return Response(['status' => false, 'message' => "Something went wrong"], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();

        // Check if the authenticated user has permission to view the profile
        if ($user->user_id == $id) {
            $userData = User::with('address', 'profile', 'experience', 'documents')->find($user->user_id);
            // return response(['message' => 'Authorized data','user'=>$userData]);
            return view('dashboard.admin.profile', ['userData' => $userData]);
        } else {
            return response(['message' => 'Unauthorized'], 401);
        }
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
        if ($userId == $id) {
            $formMethod = $request->method();
            if ($formMethod == "PATCH") {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users,email,'.$userId .',user_id',
                    'phone' => 'required|numeric|digits:10|regex:/^[6-9]\d{9}$/'
                ]);

                if ($validator->fails()) {
                    return Response(['status'=>false,'errors' => $validator->errors()], 422);
                }

                $user = User::where('user_id', $id);
                if ($user) {
                    $isUpdated = $user->update($request->all());
                    if ($isUpdated) {
                        return Response(['status'=>true,'message' => "User updated successfully"], 200);
                    }
                    return Response(['status'=>false,'message' => "Something went wrong"], 500);
                }
                return Response(['status'=>false,'message' => "User not found"], 404);
            }
            return Response(['status'=>false,'message' => "Invalid form method "], 405);
        }
        return Response(['status'=>false,'message' => 'Unauthorized'], 401);
    }

    /**
     * Soft delete user
     */
    public function destroy(string $id)
    {
        //
    }
}
