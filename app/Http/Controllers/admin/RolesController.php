<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

use App\Models\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_permissions  = Permission::all();
        return view('dashboard.roles.create',['permissions' => $all_permissions]); 
    }

    public function getRolesTableData(Request $request)
    {   
        $query = Role::query(); 
    
        $data = $query->get();
  
        if ($data) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                  
                    $actions = '<a href="/roles/'. $row->id .'/edit" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="Edit Role"><i class="mdi mdi-pen"></i></a>';
                    $actions .= '<form class="delete-role-form mx-1 d-inline" data-role-id="'. $row->id .'">';
                    $actions .= '<button type="submit" class="btn btn-danger btn-sm delete-role-button" data-toggle="tooltip" data-placement="top" title="Delete Role"><i class="mdi mdi-delete"></i></button>';
                    $actions .= '</form>';
                    
                    return $actions;
                })
                ->addColumn('permissions', function ($row) {
                    $permissions = '';
                
                    foreach ($row->permissions as $perm) {
                        $permissions .= '<span class="badge badge-info" style="margin-right: 5px;">' . $perm->name . '</span>';
                    }
                
                    return $permissions;
                })
                ->rawColumns(['actions','permissions'])
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'role_title' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $role = Role::create(['name' => $request->input('role_title'), 'guard_name' => 'web']);
        $permissions = Permission::whereIn('id', $request->input('permissions'))->get();

        // return $permissions;
        $role->syncPermissions($permissions);

        return response()->json(['status'=>true,'message' => 'Role created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role_id=$id;
        $role = Role::findById($id,'web');

        $role_name=$role->name;
        $all_permissions = Permission::all();
        $role_permissions = $role->permissions->pluck('id')->toArray();

        return view('dashboard.roles.edit',compact('role_id','role_name','all_permissions','role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [ 
            'role_title' => 'required|string|unique:roles,name,'. $id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $role = Role::findById($id, 'web');
        $permissions =$request->permissions;

        if(!$role) return Response(['status' => false, 'message' =>"Role not found !"], 404);

        $role->name = $request->role_title;
        $role->save();

        $permissions = Permission::whereIn('id', $request->input('permissions'))->get();
        $role->syncPermissions($permissions);

        return Response(['status' => true, 'message' =>"Role updated successfully !"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
// dd($id);
        $role = Role::findById($id,'web');

        if (!is_null($role)) {

            $isDeleted = $role->delete();

            if ($isDeleted) {
                return Response(['status' => true, 'message' => "Role deleted successfully"], 200);
            }

            return Response(['status' => false, 'message' => "Something went wrong"], 500);
        }
        return Response(['status' => false, 'message' => "Role not found"], 404);
    }

    public function getUserRoles($userId)
    {
        $user = User::find($userId);
    
        if($user) {
            $current_role = $user->getRoleNames();
            $all_roles = Role::pluck('name');

            return response()->json(['user_id'=>$userId,'current_role' => $current_role,'all_roles' => $all_roles]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function assignRole(Request $request,$user_id) 
    {
        $validator=Validator::make($request->all(),['newRole'=>'required']);

        if($validator->fails()){
            return Response(['status'=>false,'message' => $validator->errors()],422);
        }

        $new_role=$request->newRole;

        $user=User::find($user_id);

        if($user){
            $role = $user->hasRole($new_role); /** check user has this role */ 
            if(!$role){
                $roles = $user->getRoleNames(); /** get all roles of user */

                $user->syncRoles([]); /** remove all previous roles */

                /** assign new role to user */
                $user->assignRole($new_role); 
                dd($role);

                return Response(['user'=>$user,'message'=>"Role assigned"],200);
            }
           
            $permissions = $user->permissions;
            
            return Response(['status'=>true,'user'=>$user,'role'=>$role,'permissions'=>$permissions,'message'=>"Role assigned"],200);
        }
        else{
            return Response(['status'=>false,'message'=>"User not found"],404);
        }
    }
}
