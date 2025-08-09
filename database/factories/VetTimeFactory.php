<?php
namespace Database\Factories;

use App\Models\VetDate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VetTime>
 */
class VetTimeFactory extends Factory
{
    public function definition(): array
    {
        // Generate jam mulai antara 08:00 hingga 16:00
        $jamMulai = $this->faker->numberBetween(8, 16);
        $jamSelesai = $jamMulai + 1;

        // Format waktu yang kompatibel dengan PostgreSQL
        $startTime = sprintf('%02d:00:00', $jamMulai);
        $endTime = sprintf('%02d:00:00', $jamSelesai);

        return [
            'vet_date_id' => VetDate::factory(),
            'jam_mulai' => $startTime,
            'jam_selesai' => $endTime,
        ];
    }
}
