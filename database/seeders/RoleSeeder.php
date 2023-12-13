<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    // Crear usuarios y roles existentes
    $super_admin_user = User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('admin')]);
    User::create(['name' => 'test', 'email' => 'test@gmail.com', 'password' => Hash::make('admin')]);
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
