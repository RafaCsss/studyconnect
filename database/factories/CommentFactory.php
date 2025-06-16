<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $comments = [
            "¡Me parece súper interesante! 🤔",
            "Tengo la misma duda, ¿alguien nos ayuda?",
            "Yo también estoy en esa materia, podemos estudiar juntos",
            "Gracias por compartir, me sirvió mucho 🙏",
            "¿Podrías explicar esa parte otra vez?",
            "¡Qué genial! Me motiva a seguir estudiando 💪",
            "Yo tengo esos apuntes, te los paso",
            "Me pasa exactamente lo mismo jajaja 😅",
            "Ese método de estudio es buenísimo, lo voy a probar",
            "¿En qué universidad estudias? Tengo clases similares",
            "¡Felicitaciones! Se nota el esfuerzo 🎉",
            "¿Puedo unirme al grupo de estudio?",
            "Ese profesor es el mejor de la facultad ⭐",
            "Me ayudaste un montón con esta publicación",
            "¿Tienes más recursos sobre ese tema?"
        ];

        return [
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'content' => fake()->randomElement($comments),
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
