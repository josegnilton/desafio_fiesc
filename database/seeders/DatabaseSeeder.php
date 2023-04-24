<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria um usuário genérico
        $user = User::create([
            'name' => 'Usuário Genérico',
            'email' => 'user@example.com',
            'password' => bcrypt('123456'),
        ]);

        // Cria uma task genérica e atribui ao usuário genérico
        Task::create([
            'title' => 'Task Genérica',
            'description' => 'Descrição da task genérica',
            'user_id' => $user->id,
            'type' => 'Solicitação de Serviço',
            'priority' => 'Alta'
        ]);
    }
}
