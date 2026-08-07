<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\{Carbon, Str};

use App\Models\Module;
class ModuleSeeder extends Seeder
{
    public function run()
    {
        // Module::factory()->count(10)->create();
        $modules = [
            'superadmin',
            'admin',
            'editor',
        ];

        $subModules = [
            [
                'parent_id' => 1, //superadmin Module
                'modules' => [
                    'Super Admin Dashboard',
                    'Users',
                    'Roles',
                    'Permissions',
                    'Sales',
                ]
            ],
            [
                'parent_id' => 2, //admin Module
                'modules' => [
                    'Admin Dashboard',
                    'Users',
                    'Roles',
                ]
            ],
            [
                'parent_id' => 3, // Editor Module
                'modules' => [
                    'Editor Dashboard',
                    'Users',
                    'Sales',
                ]
            ],
        ];


        foreach ($modules as $module) {
            Module::create([
                'name' => $module,
                'slug' => Str::slug($module),
            ]);
        }

        foreach ($subModules as $subModule) {
            $module_array = [];
            foreach ($subModule['modules'] as $module) {
                array_push($module_array, [
                    'name' => $module,
                    'slug' => Str::slug($module),
                    'parent_id' => $subModule['parent_id'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            Module::insert($module_array);
        }

    }
}
