<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use DB;
use Iluminatte\Support\Facedes\Str;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
           $faker = Faker::create();
       return [
            
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'acesso' => "Aluno",
                'cpf'=> ("12312312332"),
                'endereco' => $faker->address,
                'image' => 'avatar0',
           
               
            ];

    }



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function professo()

    {
            return $this->state (function (array $attributes){
                    
                        $faker = Faker::create();
                            return [
                            
                                'name' => $faker->name,
                                'email' => $faker->email,
                                'password' => $faker->password,
                                'acesso' => "Professor",
                                'cpf'=> ("12312312332"),
                                'endereco' => $faker->address,
                                'image' => 'avatar0',
                        
                            
                            ];

            });
    }
}
