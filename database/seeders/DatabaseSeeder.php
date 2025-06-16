<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Follow;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar datos existentes
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Like::truncate();
        Comment::truncate();
        Follow::truncate();
        Post::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crear usuario de prueba principal
        $testUser = User::factory()->create([
            'name' => 'Rafael Estudiante',
            'email' => 'test@studyconnect.com',
            'bio' => 'Estudiante apasionado por la tecnología y el aprendizaje colaborativo',
            'university' => 'Universidad de Lima',
            'career' => 'Ingeniería de Sistemas',
            'semester' => 8,
        ]);

        // Crear 20 usuarios más
        $users = User::factory(20)->create();
        $allUsers = $users->push($testUser);

        // Crear posts para cada usuario (2-5 posts por usuario)
        foreach ($allUsers as $user) {
            $postCount = rand(2, 5);
            $posts = Post::factory($postCount)->create([
                'user_id' => $user->id,
            ]);

            // Agregar comentarios random a algunos posts
            foreach ($posts as $post) {
                if (rand(1, 100) <= 70) { // 70% chance de tener comentarios
                    $commentCount = rand(1, 4);
                    Comment::factory($commentCount)->create([
                        'post_id' => $post->id,
                        'user_id' => $allUsers->random()->id,
                    ]);
                }

                // Agregar likes random
                $likersCount = rand(0, 8);
                $randomUsers = $allUsers->random(min($likersCount, $allUsers->count()));
                foreach ($randomUsers as $liker) {
                    Like::firstOrCreate([
                        'user_id' => $liker->id,
                        'post_id' => $post->id,
                    ]);
                }
            }
        }

        // Crear relaciones de seguimiento random
        foreach ($allUsers as $user) {
            $followCount = rand(3, 10);
            $usersToFollow = $allUsers->where('id', '!=', $user->id)->random(min($followCount, $allUsers->count() - 1));
            
            foreach ($usersToFollow as $userToFollow) {
                Follow::firstOrCreate([
                    'follower_id' => $user->id,
                    'following_id' => $userToFollow->id,
                ]);
            }
        }

        $this->command->info('🎉 Base de datos poblada exitosamente!');
        $this->command->info('👤 Usuarios creados: ' . User::count());
        $this->command->info('📝 Posts creados: ' . Post::count());
        $this->command->info('💬 Comentarios creados: ' . Comment::count());
        $this->command->info('❤️ Likes creados: ' . Like::count());
        $this->command->info('👥 Follows creados: ' . Follow::count());
        $this->command->info('');
        $this->command->info('🔑 Usuario de prueba:');
        $this->command->info('   Email: test@studyconnect.com');
        $this->command->info('   Password: password');
    }
}
