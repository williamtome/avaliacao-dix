<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::updateOrCreate([
            'name' => 'Administrador',
            'role' => 'ROLE_ADMIN',
        ]);

        Role::updateOrCreate([
            'name' => 'Usuário',
            'role' => 'ROLE_USER',
        ]);
    }
}
