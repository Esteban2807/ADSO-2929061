<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Razas por especie.
     */
    protected array $breeds = [
        'Perro' => ['Criollo', 'Pastor Alemán', 'Labrador', 'Pitbull', 'Poodle'],
        'Gato'  => ['Criollo', 'Siamés', 'Persa', 'Maine Coon'],
        'Ave'   => ['Periquito', 'Canario', 'Loro Amazónico', 'Agapornis'],
    ];

    /**
     * Nombres populares de mascotas en Colombia.
     */
    protected array $names = [
        'Toby', 'Manchas', 'Pelusa', 'Canela', 'Negrita',
        'Choco', 'Loba', 'Simón', 'Pipa', 'Coco',
        'Mona', 'Kiko', 'Trueno', 'Nala', 'Pinky',
    ];

    /**
     * Ciudades colombianas para la ubicación.
     */
    protected array $locations = [
        'Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena',
        'Bucaramanga', 'Pereira', 'Manizales', 'Ibagué', 'Pasto',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. Elegir especie
        $kind = fake()->randomElement(array_keys($this->breeds));

        // 2. La raza corresponde a la especie
        $breed = fake()->randomElement($this->breeds[$kind]);

        // 3. Peso realista según especie
        $weight = match ($kind) {
            'Perro' => fake()->randomFloat(1, 3, 35),
            'Gato'  => fake()->randomFloat(1, 2, 7),
            'Ave'   => fake()->randomFloat(3, 0.02, 0.5),
        };

        return [
            'name'        => fake()->randomElement($this->names),
            'kind'        => $kind,
            'weight'      => $weight,
            'age'         => fake()->numberBetween(1, 12),
            'breed'       => $breed,
            'location'    => fake()->randomElement($this->locations),
            'description' => fake()->sentence(6),
        ];
    }
}