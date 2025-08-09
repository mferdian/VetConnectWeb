<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Spesialisasi;
use App\Models\User;
use App\Models\Vet;
use App\Models\VetDate;
use App\Models\VetTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat 5 Spesialisasi
        $spesialisasiList = Spesialisasi::factory()->count(10)->create();

        // 2. Buat 10 Vet + Relasi VetDate & VetTime
        Vet::factory(10)
            ->has(
                VetDate::factory()
                    ->count(3)
                    ->has(VetTime::factory()->count(4), 'vetTimes'),
                'vetDates'
            )
            ->create()
            ->each(function ($vet) use ($spesialisasiList) {
                // 3. Attach 1–3 spesialisasi secara acak
                $vet->spesialisasis()->attach(
                    $spesialisasiList->random(rand(1, 3))->pluck('id')->toArray()
                );
            });

        // 4. Buat Admin & User
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@vetconnect.com',
            'password' => bcrypt('gugun123'),
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'birra',
            'email' => 'birra@gmail.com',
            'password' => bcrypt('birra123'),
            'is_admin' => false,
        ]);
    }
}
