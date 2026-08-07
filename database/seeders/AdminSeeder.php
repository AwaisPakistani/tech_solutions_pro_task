<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin_role = Role::create([
            'name' => 'Super Admin',
        ]);

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'status'=>1,
        ]);

        $superAdmin->assignRole($superAdmin_role);

        // Admin User and Role

        $Admin_role = Role::create([
            'name' => 'Admin',
        ]);

        $Admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminuser'),
            'status'=>1,
        ]);
        $Admin->assignRole($Admin_role);
        // Editor User and Role
        $editor_role = Role::create([
            'name' => 'Editor',
        ]);

        $Editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('editoruser'),
            'status'=>1,

        ]);
        $Editor->assignRole($editor_role);
    }
}
