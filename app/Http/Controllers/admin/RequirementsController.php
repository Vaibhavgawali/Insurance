<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

use App\Models\User;
use App\Models\Requirements;

class RequirementsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:sanctum');

        //  Spatie middleware here
        $this->middleware(['role_or_permission:Superadmin|view_self_requirement_list|view_requirement_list'])->only('index');
        $this->middleware(['role_or_permission:Superadmin|put_requirement'])->only('store');
        // $this->middleware(['role_or_permission:Superadmin|view_requirement'])->only('show');
        $this->middleware(['role_or_permission:Superadmin|delete_requirement'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        if ($user->hasRole('Superadmin')) {
            $requirements = Requirements::with('user')->orderBy('user_id', 'desc')->get();
        
        } elseif ($user->hasRole(['Insurer', 'Institute'])) {
            $requirements = Requirements::with('user')->where('user_id', $user->user_id)->get();
        } else {
            $requirements = null;
        }
        return view('dashboard.admin.requirements-list',['requirements' => $requirements]);
    }
 
       
    /**
     * 
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
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'requirement_text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $requirement = Requirements::create([
            'requirement_text' => $request->requirement_text,
            'user_id' => $user->user_id,
        ]);
        

        return $requirement
                ? response(['status' => true, 'message' => 'Requirement added successfully'], 200)
                : response(['status' => false, 'message' => 'Something went wrong'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=Auth::user();

        if($user->hasRole('Superadmin')){
            $requirement = Requirements::with('user')->find($id);
        } elseif($user->hasRole(['Insurer','Institute'])){
            $requirement = Requirements::where(['user_id' => $user->user_id, 'id' => $id])->first();
        }

        return view('dashboard.admin.requirements-list',['requirement' => $requirement]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=Auth::user();
        $requirement = Requirements::find($id);

        if (!$requirement) {
            return response(['message' => 'Requirement not found'], 404);
        }

        $isTrashed = $requirement->delete();

        return $isTrashed
            ? response(['message' => 'Requirement deleted successfully'], 200)
            : response(['message' => 'Something went wrong'], 500);
    }
}
