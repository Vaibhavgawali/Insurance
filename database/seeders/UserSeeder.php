<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
 
        $admin = User::create([
            'name' => 'Superadmin',
            'email' => 'admin@gmail.com',
            'phone'=> '1234567890',
            'password' => bcrypt('Admin@1234'), 
        ]);

        $admin->assignRole('Superadmin');

        $institute = User::create([
            'name' => 'Institute',
            'email' => 'institute@gmail.com',
            'phone'=> '1234567890',
            'password' => bcrypt('Institute@1234'), 
        ]);

        $institute->assignRole('Institute');

        $insurer = User::create([
            'name' => 'Insurer',
            'email' => 'insurer@gmail.com',
            'phone'=> '1234567890',
            'password' => bcrypt('Insurer@1234'), 
        ]);

        $insurer->assignRole('Insurer');

        $candidate = User::create([
            'name' => 'Candidate',
            'email' => 'candidate@gmail.com',
            'phone'=> '1234567890',
            'password' => bcrypt('Candidate@1234'), 
        ]);

        $candidate->assignRole('Candidate');
    }
}

