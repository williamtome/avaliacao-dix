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
            'resource' => 'user.index',
        ]);

        Resource::updateOrCreate([
            'name' => 'Cadastrar usuários',
        ], [
            'resource' => 'user.store',
        ]);

        Resource::updateOrCreate([
            'name' => 'Atualizar usuários',
        ], [
            'resource' => 'user.update',
        ]);

        Resource::updateOrCreate([
            'name' => 'Remover usuários',
        ], [
            'resource' => 'user.destroy',
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
