<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([

            'name' => "secretaria",
            'email' => "secretaria@x6dev.edu",
            'password' => Hash::make("Secretaria123"),
            'acesso' => "secretaria",
            'cpf' => "1231231232",
            'endereco' => "rua",
            'image' => 'avatar0'
        
        ]);
    }
}
