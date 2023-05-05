<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceRoleSeeder extends Seeder
{
    public function run(): void
    {
        // PARA O ADMIN
        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 1,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 2,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 3,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 4,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 5,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 6,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 7,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 1,
            'resource_id' => 8,
        ]);


        // PARA O USUARIO
        DB::table('resource_role')->insert([
            'role_id' => 2,
            'resource_id' => 7,
        ]);

        DB::table('resource_role')->insert([
            'role_id' => 2,
            'resource_id' => 8,
        ]);
    }
}
