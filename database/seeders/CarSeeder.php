<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Seed the cars table.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'merek' => 'Toyota',
            'model' => 'Avanza',
            'nomor_plat' => 'B1234XYZ',
            'tarif_sewa_per_hari' => 350000,
        ]);

        Car::create([
            'merek' => 'Honda',
            'model' => 'Civic',
            'nomor_plat' => 'B5678ABC',
            'tarif_sewa_per_hari' => 500000,
        ]);

        Car::create([
            'merek' => 'Suzuki',
            'model' => 'Swift',
            'nomor_plat' => 'B9101DEF',
            'tarif_sewa_per_hari' => 300000,
        ]);

        Car::create([
            'merek' => 'BMW',
            'model' => 'X5',
            'nomor_plat' => 'B1122GHJ',
            'tarif_sewa_per_hari' => 1500000,
        ]);

        Car::create([
            'merek' => 'Mercedes',
            'model' => 'A-Class',
            'nomor_plat' => 'B3344IJK',
            'tarif_sewa_per_hari' => 1200000,
        ]);
    }
}
