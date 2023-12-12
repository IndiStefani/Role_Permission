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
            $super = User::create([
                'email' => 'super@gmail.com',
                'name' => 'super',
                'password' => bcrypt('12345678')
            ]);
    
            $admin = User::create([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('12345678')
            ]);
    
            $pegawai = User::create([
                'email' => 'pegawai@gmail.com',
                'name' => 'pegawai',
                'password' => bcrypt('12345678')
            ]);
    
    
            $role_super = Role::create(['name' => 'super']);
            $role_admin = Role::create(['name' => 'admin']);
            $role_pegawai = Role::create(['name' => 'pegawai']);
    
    
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'delete role']);
            $permission = Permission::create(['name' => 'update role']);
    
            $role_super->givePermissionTo(['read role']);
            $role_super->givePermissionTo(['create role']);
            $role_super->givePermissionTo(['delete role']);
            $role_super->givePermissionTo(['update role']);

            $super->assignRole('super');
            $admin->assignRole('admin');
            $pegawai->assignRole('pegawai');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }
}
