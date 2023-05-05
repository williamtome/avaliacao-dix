<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Usuários
         */
        Resource::updateOrCreate([
            'name' => 'Listar usuários',
        ], [
            'resource' => 'users.index',
        ]);

        Resource::updateOrCreate([
            'name' => 'Cadastrar usuários',
        ], [
            'resource' => 'users.store',
        ]);

        Resource::updateOrCreate([
            'name' => 'Atualizar usuários',
        ], [
            'resource' => 'users.update',
        ]);

        Resource::updateOrCreate([
            'name' => 'Remover usuários',
        ], [
            'resource' => 'users.destroy',
        ]);

        /**
         * Notícias
         */
        Resource::updateOrCreate([
            'name' => 'Listar notícias',
        ], [
            'resource' => 'news.index',
        ]);

        Resource::updateOrCreate([
            'name' => 'Cadastrar notícias',
        ], [
            'resource' => 'news.store',
        ]);

        Resource::updateOrCreate([
            'name' => 'Atualizar notícias',
        ], [
            'resource' => 'news.update',
        ]);

        Resource::updateOrCreate([
            'name' => 'Remover notícias',
        ], [
            'resource' => 'news.destroy',
        ]);
    }
}
