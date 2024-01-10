<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function getUserDetails(Request $request)
    {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);

        $roles = Role::all();
        $currentRole = $user->getRoleNames()->first();
        $assignedPermissions = $user->permissions()->pluck('id')->toArray();
        // $assignedPermissions = $user->getPermissionsViaRoles()->toArray();

        return response()->json([
            'roles' => $roles,
            'currentRole' => $currentRole,
            'permissions' => $this->getRolePermissions($currentRole, $assignedPermissions),
        ]);
    }

    public function getRolePermissions($roleName, $assignedPermissions)
    {
        $role = Role::where('name', $roleName)->first();

        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $permissions = $role->permissions->map(function ($permission) use ($assignedPermissions) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'assigned' => in_array($permission->id, $assignedPermissions),
            ];
        });

        return $permissions;
    }

    public function getRolePermissionsById(Request $request)
    {
        $roleId = $request->role_id;
        $assignedPermissions = [];

        if ($roleId) {
            $role = Role::findOrFail($roleId);
            $assignedPermissions = $role->permissions()->pluck('id')->toArray();
        }

        return response()->json([
            'permissions' => $this->getRolePermissions($role->name, $assignedPermissions),
        ]);
    }

    public function updateUserRolesPermissions(Request $request)
    {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);
        dd($userId);
        // Sync user roles
        $user->syncRoles([$request->role]);

        // Sync user permissions
        $user->syncPermissions($request->permissions);

        return response()->json(['message' => 'Roles and permissions updated successfully']);
    }
}