<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds. @return void
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {    
            $admin = User::create([
                'avatar' => 'default.png',
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('12345678')
            ]);
    
            $user = User::create([
                'avatar' => 'default.png',
                'email' => 'user@gmail.com',
                'name' => 'user',
                'password' => bcrypt('12345678')
            ]);
    
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_user = Role::create(['name' => 'user']);
    
    
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'delete role']);
            $permission = Permission::create(['name' => 'update role']);
    
            $role_admin->givePermissionTo(['read role']);
            $role_admin->givePermissionTo(['create role']);
            $role_admin->givePermissionTo(['delete role']);
            $role_admin->givePermissionTo(['update role']);

            $admin->assignRole('admin');
            $user->assignRole('user');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }
}
