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
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => bcrypt('1234678'),
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $super = User::create(array_merge([
                'email' => 'super@gmail.com',
                'name' => 'super',
                
            ], $default_user_value));
    
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                
            ], $default_user_value));
    
            $pegawai = User::create(array_merge([
                'email' => 'pegawai@gmail.com',
                'name' => 'pegawai',
                
            ], $default_user_value));
    
    
            $role_super = Role::create(['name' => 'super']);
            $role_admin = Role::create(['name' => 'admin']);
            $role_pegawai = Role::create(['name' => 'pegawai']);
    
    
            $permission = Permission::create([
                'name' => 'read role',
                'name' => 'create role',
                'name' => 'delete role',
                'name' => 'update role'
            ]);
    
            $role_super->givePermissionTo([
                'read role',
                'create role',
                'delete role',
                'update role',
            ]);
    
            $super->assignRole('super');
            $admin->assignRole('admin');
            $pegawai->assignRole('pegawai');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }
}
