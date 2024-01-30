<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\EmailVerified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PDF;
use Yajra\DataTables\DataTables;

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
            // $users = User::role('Candidate')->with('address', 'profile', 'experience', 'documents')->orderBy('user_id', 'desc')->get();
            $users = User::where('category', 'Candidate')
                    ->with('address', 'profile', 'experience', 'documents')
                    ->orderBy('user_id', 'desc')
                    ->get();

            if ($users) {
                // return Response(['data' => $users], 200);
                return view('dashboard.admin.candidate-list');
            }
            // return Response(['message' => "Users with role Candidate not found "], 404);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }
    
    
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
            // "joining_date" => 'required_if:experience,experienced',
            'experience_year'=>'required_if:experience,experienced|numeric',
            'preffered_line' => 'required|string|max:60',
            'city' => 'required|string|max:60'
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, //Hash::make($request->password),
            'phone' => $request->phone,
            'category' => "Candidate"
        ]);

        if ($user) {
            $user_id = $user->user_id;
            $user_profile = UserProfile::create([
                'user_id' => $user_id,
                'preffered_line' => $request->preffered_line,
            ]);
            // dd($user_profile);

            // if ($request->experience == "experienced") {
                $user_address = UserAddress::create([
                    'user_id' => $user_id,
                    'city' => $request->city,
                ]);
            // }
            if ($request->experience == "experienced") {
                $user_experience = UserExperience::create([
                    'user_id' => $user_id,
                    'organization' => $request->organization,
                    'designation' => $request->designation,
                    'ctc' => $request->ctc,
                    'experience_year'=>$request->experience_year,
                    "joining_date" => $request->joining_date,
                    "relieving_date" => $request->relieving_date
                ]);
        //  dd($user_experience);           //experienced

            }
        //  dd($request->experience);           //experienced


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

    public function getCandidateTableData()
    {
        if (Auth::check()) {
            $data = User::role('Candidate')
    ->with('address', 'profile', 'experience', 'documents')
    ->when(request()->has('filter_Line'), function ($query) {
        $filterLine = request('filter_Line');

        if ($filterLine === 'other') {
            // Exclude rows where preffered_line is 'life', 'general', or 'health'
            $query->whereHas('profile', function ($profileQuery) {
                $profileQuery->whereNotIn('preffered_line', ['life', 'general', 'health']);
            });
        } else {
            // Include rows where preffered_line is like the specified filter
            $query->whereHas('profile', function ($profileQuery) use ($filterLine) {
                $profileQuery->where('preffered_line', 'like', '%' . $filterLine . '%');
            });
        }     
    })
    ->when(request()->has('documents'), function ($query) {
        $documents = request('documents');
        if ($documents === 'uploaded') { // Corrected the condition
            $query->whereHas('documents');
        } else if ($documents === 'not_uploaded') {
            $query->whereDoesntHave('documents');
        }
    })
    ->when(request()->has('experience'), function ($query) {
        $experience = request('experience');
        if ($experience === 'experienced') { // Corrected the condition
            $query->whereHas('experience');
        } else if ($experience === 'fresher') {
            $query->whereDoesntHave('experience');
        }
    })
    ->orderBy('user_id', 'desc')
    ->get();

            if ($data) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($row) {
                        $actions = '<a href="/admin/user/' . $row->user_id . '" class="btn btn-sm btn-gradient-success btn-rounded">View</a>';
                        $actions .= '<a href="#" class="btn btn-sm btn-gradient-warning btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</a>';
                        $actions .= '<form class="delete-user-form" data-user-id="' . $row->user_id . '">
                            <button type="button" class="btn btn-sm btn-gradient-danger btn-rounded delete-user-button">Delete</button>
                        </form>';
                        return $actions;
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
            }
        }
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
    /**
 * Soft delete user
 */
/**
 * Soft delete user
 */
public function destroy(string $id)
{
    // Check if the authenticated user has the "Superadmin" role
    // if (Auth::user()->hasCategory('Superadmin')) {

    if (Auth::user()->hasRole('Superadmin')) {
        $user = User::find($id);

        if (!$user) {
            return Response(['status' => false, 'message' => "User not found"], 404);
        }

        $isDeleted = $user->delete();

        if ($isDeleted) {
            return Response(['status' => true, 'message' => "User deleted successfully"], 200);
        }

        return Response(['status' => false, 'message' => "Something went wrong"], 500);
    }

    return Response(['status' => false, 'message' => 'Unauthorized'], 401);
}



    /**
     * Download candidate profile
     */
    public function downloadCandidateProfilePDF($userId)
    {
        $user = User::findOrFail($userId);
        $userData = User::with('address', 'profile', 'experience')->find($user->user_id);

        $pdf = PDF::loadView('dashboard.admin.profile-pdf', compact('userData'))
                ->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true])
                ->setPaper('A4');

        return $pdf->download('certificate_'.$user->id.'.pdf');
    }

}
