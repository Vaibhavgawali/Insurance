<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin=Role::create(['name'=>'Superadmin']);
        $candidate=Role::create(['name'=>'Candidate']);
        $insurer=Role::create(['name'=>'Insurer']);
        $institute=Role::create(['name'=>'Institute']);
        $other=Role::create(['name'=>'Other']);
        

        $view_users_list = Permission::create(['name' => 'view_users_list']);
        $view_user_details = Permission::create(['name' => 'view_user_details']);
        $update_user_details = Permission::create(['name' => 'update_user_details']);
        $delete_user = Permission::create(['name' => 'delete_user']);
        $view_requirement_list = Permission::create(['name' => 'view_requirement_list']);
        $view_requirement = Permission::create(['name' => 'view_requirement']);
        $delete_requirement = Permission::create(['name' => 'delete_requirement']);
        
        $upload_resume=Permission::create(['name'=>'upload_resume']);
        $view_modules=Permission::create(['name'=>'view_modules']);
        $take_assessment=Permission::create(['name'=>'take_assessment']);
        $download_certificate=Permission::create(['name'=>'download_certificate']);

        $put_requirement=Permission::create(['name'=>'put_requirement']);
        $view_candidate_list=Permission::create(['name'=>'view_candidate_list']);
        $view_candidate_details=Permission::create(['name'=>'view_candidate_details']);
        $download_candidate_details=Permission::create(['name'=>'download_candidate_details']);
        $view_candidate_resume=Permission::create(['name'=>'view_candidate_resume']);
        $download_candidate_resume=Permission::create(['name'=>'download_candidate_resume']);
        $view_self_requirement_list=Permission::create(['name'=>'view_self_requirement_list']);

        $superadmin_permissions=[
            $view_users_list,
            $view_user_details,
            $update_user_details,
            $delete_user,
            $view_requirement_list,
            $view_requirement,
            $delete_requirement
        ];

        $candidate_permissions=[
            $upload_resume,
            $view_modules,
            $take_assessment,
            $download_certificate
        ];
        
        $insurer_permissions=[
            $view_candidate_list,
            $view_candidate_details,
            $view_candidate_resume,
            $download_candidate_details,
            $download_candidate_resume,
            $put_requirement,
            $view_self_requirement_list,
        ];

        $institute_permissions=[
            $put_requirement,
            $view_modules
        ];

        $other_permissions=[
            $view_candidate_list,
            $view_candidate_details,
            $view_candidate_resume,
            $download_candidate_details,
            $download_candidate_resume,
            $put_requirement,
            $view_self_requirement_list,
        ];

        $superadmin->syncPermissions($superadmin_permissions);
        $candidate->syncPermissions($candidate_permissions);
        $insurer->syncPermissions($insurer_permissions);
        $institute->syncPermissions($institute_permissions);
        $other->syncPermissions($other_permissions);
    }
}
