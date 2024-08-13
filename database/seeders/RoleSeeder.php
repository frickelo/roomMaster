<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios y roles existentes
        $super_admin_user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'carrera' => 'admin',
            'curso' => 'admin',
        ]);

        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin'),
            'carrera' => 'some_carrera',
            'curso' => 'some_curso',
        ]);

        $role = Role::create(['name' => 'super_admin']);
        $permission_array = [];

        array_push($permission_array, Permission::create(['name' => 'create_facultad']));
        array_push($permission_array, Permission::create(['name' => 'edit_facultad']));
        array_push($permission_array, Permission::create(['name' => 'delete_facultad']));
        array_push($permission_array, Permission::create(['name' => 'view_facultad']));

        $super_admin_user->assignRole($role->id);
        $role->syncPermissions($permission_array);

        // Crear el nuevo rol 'usuario'
        $usuario_role = Role::create(['name' => 'user']);
        
        // Encontrar o crear el permiso 'view_facultad'
        $view_facultad_permission = Permission::firstOrCreate(['name' => 'view_facultad']);
        
        // Asignar el permiso 'view_facultad' al rol 'usuario'
        $usuario_role->givePermissionTo($view_facultad_permission);
    }
}