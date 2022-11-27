<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use Iluminatte\Support\Facedes\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        \App\Models\User::factory()->create([

            'name' => "secretaria",
            'email' => "secretaria@x6dev.edu",
            'password' => Hash::make("senha"),
            'acesso' =>("Secretaria"),
            'cpf' => "12312312322",
            'endereco' => "rua",
            'image' => 'avatar0'
        
        ]);
        \App\Models\User::factory(count:15)->create();
        \App\Models\User::factory(count:5)->professo()->create();
    
        
    
        \App\Models\Curso::factory()->create();
        \App\Models\Curso::factory()->curso2()->create();
        \App\Models\Curso::factory()->curso3()->create();
      
        
    
    }
}
