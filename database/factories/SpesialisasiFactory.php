<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spesialisasi>
 */
class SpesialisasiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_hewan' => $this->faker->randomElement([
                'Sapi', 'Kucing', 'Kelinci', 'Burung', 'Hamster', 'Reptil', 'Ayam', 'Ikan'
            ]),
        ];
    }
}
