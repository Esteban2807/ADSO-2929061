<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

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
    public function definition(): array
    {
        // 1. Definir género
        $gender = fake()->randomElement(['Male', 'Female']);

        // 2. Nombre coherente con el género
        $fakerGender = $gender === 'Male' ? 'male' : 'female';
        $firstName   = fake()->firstName($fakerGender);
        $lastName    = fake()->lastName();

        // 3. Descargar y guardar la foto en public/images
        $photo = $this->downloadPhoto($gender);

        return [
            'document'          => fake()->unique()->numerify('75#####'),
            'fullname'          => $firstName . ' ' . $lastName,
            'gender'            => $gender,
            'birthdate'         => fake()->date('Y-m-d', '-18 years'),
            'phone'             => fake()->unique()->numerify('320########'),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => bcrypt('12345'),
            'photo'             => $photo,
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Descarga una foto de randomuser.me y la guarda en public/images.
     * Devuelve la ruta relativa para guardar en la base de datos.
     */
    private function downloadPhoto(string $gender): string
    {
        // Crear la carpeta si no existe
        $folder = public_path('images');
        File::ensureDirectoryExists($folder);

        $photoGender = $gender === 'Male' ? 'men' : 'women';
        $index       = fake()->numberBetween(1, 99);
        $url         = "https://randomuser.me/api/portraits/{$photoGender}/{$index}.jpg";

        // Nombre único para evitar colisiones
        $filename = $photoGender . '_' . $index . '_' . Str::random(6) . '.jpg';
        $fullPath = $folder . '/' . $filename;

        try {
            $response = Http::timeout(10)->get($url);

            if ($response->successful()) {
                File::put($fullPath, $response->body());
                return 'images/' . $filename;
            }
        } catch (\Exception $e) {
            // Si falla la descarga, se guarda vacío
        }

        return '';
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