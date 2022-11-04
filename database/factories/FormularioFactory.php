<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormularioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'opcao' => $this->faker->randomElement($array = array ('Reclamação','Elógio','Sugestão')),
            'mensagem_contato' => $this->faker->text(), 
        ];
    }
}
