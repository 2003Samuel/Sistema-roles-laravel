<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;

class SeederTablePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            // Table roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            // Table blog
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog'
        ];

        foreach ($permission as $p) {
            Permission::create(['name' => $p]);
        }
    }
}
