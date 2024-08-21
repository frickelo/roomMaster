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
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('admin'),
            'carrera' => 'admin',
            'curso' => 'admin',
        ]);

        $admin_user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'carrera' => 'admin_carrera',
            'curso' => 'admin_curso',
        ]);

        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin'),
            'carrera' => 'some_carrera',
            'curso' => 'some_curso',
        ]);

        // Crear roles
        $super_admin_role = Role::create(['name' => 'super_admin']);
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

        // Crear permisos y asignarlos a super_admin
        $permission_array = [];

        array_push($permission_array, Permission::create(['name' => 'create_facultad']));
        array_push($permission_array, Permission::create(['name' => 'edit_facultad']));
        array_push($permission_array, Permission::create(['name' => 'delete_facultad']));
        array_push($permission_array, Permission::create(['name' => 'view_facultad']));

        array_push($permission_array, Permission::create(['name' => 'create_carrera']));
        array_push($permission_array, Permission::create(['name' => 'edit_carrera']));
        array_push($permission_array, Permission::create(['name' => 'delete_carrera']));
        array_push($permission_array, Permission::create(['name' => 'view_carrera']));

        array_push($permission_array, Permission::create(['name' => 'create_materia']));
        array_push($permission_array, Permission::create(['name' => 'edit_materia']));
        array_push($permission_array, Permission::create(['name' => 'delete_materia']));
        array_push($permission_array, Permission::create(['name' => 'view_materia']));

        array_push($permission_array, Permission::create(['name' => 'create_curso']));
        array_push($permission_array, Permission::create(['name' => 'edit_curso']));
        array_push($permission_array, Permission::create(['name' => 'delete_curso']));
        array_push($permission_array, Permission::create(['name' => 'view_curso']));

        array_push($permission_array, Permission::create(['name' => 'create_espacio']));
        array_push($permission_array, Permission::create(['name' => 'edit_espacio']));
        array_push($permission_array, Permission::create(['name' => 'delete_espacio']));
        array_push($permission_array, Permission::create(['name' => 'view_espacio']));

        array_push($permission_array, Permission::create(['name' => 'create_materia_espacio']));
        array_push($permission_array, Permission::create(['name' => 'edit_materia_espacio']));
        array_push($permission_array, Permission::create(['name' => 'delete_materia_espacio']));
        array_push($permission_array, Permission::create(['name' => 'view_materia_espacio']));

        array_push($permission_array, Permission::create(['name' => 'create_materia_espacio_audit']));
        array_push($permission_array, Permission::create(['name' => 'edit_materia_espacio_audit']));
        array_push($permission_array, Permission::create(['name' => 'delete_materia_espacio_audit']));
        array_push($permission_array, Permission::create(['name' => 'view_materia_espacio_audit']));

        array_push($permission_array, Permission::create(['name' => 'create_user']));
        array_push($permission_array, Permission::create(['name' => 'edit_user']));
        array_push($permission_array, Permission::create(['name' => 'delete_user']));
        array_push($permission_array, Permission::create(['name' => 'view_user']));

        // Sincronizar permisos con super_admin
        $super_admin_role->syncPermissions($permission_array);

        // Asignar permisos a admin
        $admin_permission_array = [];

        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'create_materia']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'edit_materia']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'delete_materia']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'view_materia']));

        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'create_materia_espacio']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'edit_materia_espacio']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'delete_materia_espacio']));
        array_push($admin_permission_array, Permission::firstOrCreate(['name' => 'view_materia_espacio']));

        // Sincronizar permisos con admin
        $admin_role->syncPermissions($admin_permission_array);

        // Asignar permisos a user
        $user_permission_array = [];
        array_push($user_permission_array, Permission::firstOrCreate(['name' => 'view_materia_espacio']));

        // Sincronizar permisos con user
        $user_role->syncPermissions($user_permission_array);

        // Asignar roles a usuarios
        $super_admin_user->assignRole($super_admin_role);
        $admin_user->assignRole($admin_role);
        $user->assignRole($user_role);
    }
}
