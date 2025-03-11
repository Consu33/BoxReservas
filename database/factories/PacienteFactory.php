<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rut' => $this->faker->unique()->numerify('##########'),
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date('d-m-Y', '01-01-2027'),
            'genero' => $this->faker->randomElement(['M','F']),
            'celular' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'comuna' => $this->faker->address,
            'observaciones' => $this->faker->words(nb:3, asText:true),
        ];
    }
}
