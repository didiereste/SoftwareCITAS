<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRol = Role::create(["id" => 1, "name" => "admin"]);
        $clienteRol= Role::create(["id"=>2, "name" => "cliente"]);

        Permission::create(["name" => "administrar"]);
        Permission::create(["name" => "citar"])->assignRole($clienteRol);

        $todosLosPermisos = Permission::all();
        $adminRol->syncPermissions($todosLosPermisos);

    }
}
