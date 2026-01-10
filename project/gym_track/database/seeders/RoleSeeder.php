<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);


        //crear usuarios
        $user = User::firstOrCreate([
            "username"=> "admin",
            "password"=> "admin",
        ]);

        $user->assignRole('admin');

        $user = User::firstOrCreate([
            "username"=> "user",
            "password"=> "user",
        ]);
        
        $user->assignRole('user');
    }
}
