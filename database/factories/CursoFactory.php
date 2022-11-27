<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => "JavaScript",
            "descricaoS"=> "primeiros passos do JavaScript",
            'descricaoC' => "curso compledo para iniciantes na linguagem Java Script",
            'maxAlunos' => "15",
            'minAlunos' => "5",
            'image' => "curso1",
            "user_id" =>"99999999999",
            "status" => "1"

           

            
        ];
    }

    public function curso2()

    {
            return $this->state (function (array $attributes){
                    
                        
                            return [
                            
                                'nome' => "HTML",
                                "descricaoS"=> "primeiros passos do HTML",
                                'descricaoC' => "curso compledo para iniciantes na linguagem HTML",
                                'maxAlunos' => "15",
                                'minAlunos' => "5",
                                'image' => "curso3",
                                "user_id" =>"99999999999",
                                "status" => "1"
                            
                            ];

            });
    }

    public function curso3()

    {
            return $this->state (function (array $attributes){
                    
                       
                            return [
                            
                                'nome' => "C++",
                                "descricaoS"=> "primeiros passos do C++",
                                'descricaoC' => "curso compledo para iniciantes na linguagem C++",
                                'maxAlunos' => "15",
                                'minAlunos' => "5",
                                'image' => "curso4",
                                "user_id" =>"99999999999",
                                "status" => "1"
                            
                            ];

            });
    }
}
