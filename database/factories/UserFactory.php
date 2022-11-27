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
           $senha = $faker->password;
       return [
            
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($senha),
                'acesso' => "Aluno",
                'cpf'=> random_int(10000000000,99999999999),
                'endereco' => $faker->address,
                'image' => 'avatar0',
                'movie' => 'nothing',
           
               
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
                        $senha = $faker->password;
                            return [
                            
                                'name' => $faker->name,
                                'email' => $faker->email,
                                'password' => Hash::make($senha),
                                'acesso' => "Professor",
                                'cpf'=> random_int(10000000000,99999999999),
                                'endereco' => $faker->address,
                                'image' => 'avatar0',
                        
                            
                            ];

            });
    }
}
