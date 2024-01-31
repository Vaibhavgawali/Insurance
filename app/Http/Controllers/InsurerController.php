<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
use Yajra\DataTables\DataTables;
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
            $users = User::where('category', 'Insurer')->orderBy('user_id', 'desc')->get();
            if ($users) {
                // return Response(['data' => $users], 200);
                return view('dashboard.admin.insurer-list');
            }
            // return Response(['message' => "Users with role Insurer not found "], 404);
        }

        return Response(['data' => 'Unauthorized'], 401);
    }
    public function getInsurerTableData()
    {
        if (Auth::check()) {
            $data = User::where('category', 'Insurer')
        ->with('profile')
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
    ->orderBy('user_id', 'desc')->get();
            // dd($data);
            if ($data) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($row) {
                        $actions = '<a href="/admin/user/' . $row->user_id . '" class="btn btn-sm btn-gradient-success btn-rounded">View</a>';
                        $actions .= '<a class="btn btn-sm btn-gradient-warning btn-rounded editButton" data-user-id="' . $row->user_id . '" >Edit</a>';
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
            'phone'=>'required|numeric|digits:10|regex:/^[6-9]\d{9}$/',
            'password'=>[
                        'required',
                        Password::min(8)
                                ->mixedCase()
                                ->numbers()
                                ->symbols()
            ],
            'password_confirmation' => 'required|same:password',
            'spoc'=>'required|string|max:60',
            'preffered_line'=>'required|string|max:60',
            'city'=>'required|string|max:60'
        ]);

        if($validator->fails()){
            return Response(['status'=>false,'errors' => $validator->errors()],422);
        }   

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password, //Hash::make($request->password),
            'phone'=>$request->phone,
            'category' => "Insurer"
        ]);

        if($user){
            $user_id=$user->user_id;

            $user_profile=UserProfile::create([
                'user_id'=>$user_id,
                'spoc'=>$request->spoc,
                'preffered_line'=>$request->preffered_line,
            ]);

            $user_address=UserAddress::create([
                'user_id'=>$user_id,
                'city'=>$request->city,
            ]);
            
            event(new Registered($user));
            // if($user->sendEmailVerificationNotification()){
            //     return Response(['message' => "Email is sent to email"],200);
            // }

            $user->assignRole('Insurer'); /** assign role to user */
            return Response(['status'=>true,'message' => "Insurer created successfully"],200);
        }
        return Response(['status'=>false,'message' => "Something went wrong"],500);
        
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
