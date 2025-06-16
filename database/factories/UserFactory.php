<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $universities = [
            'Universidad Nacional Mayor de San Marcos',
            'Universidad de Lima',
            'Pontificia Universidad Católica del Perú',
            'Universidad Nacional de Ingeniería',
            'Universidad Peruana de Ciencias Aplicadas',
            'Universidad San Martín de Porres',
            'Universidad Ricardo Palma'
        ];

        $careers = [
            'Ingeniería de Sistemas',
            'Medicina',
            'Derecho',
            'Administración',
            'Psicología',
            'Arquitectura',
            'Contabilidad',
            'Marketing',
            'Ingeniería Civil',
            'Comunicaciones'
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'avatar' => null, // Por ahora null, luego se puede agregar lógica para imágenes
            'bio' => fake()->optional(0.7)->sentence(rand(10, 20)),
            'university' => fake()->randomElement($universities),
            'career' => fake()->randomElement($careers),
            'semester' => fake()->numberBetween(1, 10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
