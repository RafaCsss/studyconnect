<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studyPosts = [
            "¡Terminé mi proyecto de programación! 💻 ¿Alguien más trabajando en algoritmos?",
            "Estudiando para el examen de matemáticas... ¿tips para derivadas? 📚",
            "Armando grupo de estudio para física, ¿quién se apunta? ⚡",
            "Mi presentación de historia salió genial 🎉 ¿Cómo les fue con sus exposiciones?",
            "¿Alguien tiene apuntes de química orgánica? Los míos están un desastre 😅",
            "Acabo de descobrir esta librería increíble para mi carrera 📖✨",
            "¿Tips para manejar el estrés en época de finales? 😰",
            "Compartiendo mi método de estudio: Pomodoro + música lo-fi = éxito 🍅🎵",
            "¿Alguien más siente que este semestre voló? 🚀 Ya estamos en parciales!",
            "Encontré un curso online buenísimo de mi especialidad ¿lo han visto?",
            "Mi profesora explicó el tema más difícil de manera súper clara hoy 👩‍🏫⭐",
            "¿Cómo organizan sus horarios de estudio? Necesito inspiración 📅",
            "Recién descubrí que la biblioteca tiene recursos digitales increíbles 📚💎",
            "¿Algún consejo para mejorar en presentaciones públicas? 🎤",
            "Mi experimento de laboratorio funcionó a la perfección! 🧪✅"
        ];

        return [
            'user_id' => User::factory(),
            'content' => fake()->randomElement($studyPosts),
            'image' => null, // Por ahora sin imágenes
            'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
