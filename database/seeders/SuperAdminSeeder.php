<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mateo Quiroz',
            'email' => 'mateo@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        // $rol = Role::create(['name' => 'Administrador']);

        // $permission = Permission::pluck('id', 'id')->all();

        //$rol->syncPermissions($permission);

        $user->assignRole('Administrador');
    }
}
