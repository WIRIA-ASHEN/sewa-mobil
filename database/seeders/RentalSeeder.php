<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RentalSeeder extends Seeder
{
    /**
     * Seed the rentals table.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role', 'user')->get();

        $cars = Car::all();

        foreach ($users as $user) {
            foreach ($cars->random(2) as $car) {
                // Hitung jumlah hari sewa
                $tanggal_mulai = Carbon::now()->addDays(rand(1, 7)); 
                $tanggal_selesai = Carbon::now()->addDays(rand(8, 14)); 
                $days = $tanggal_mulai->diffInDays($tanggal_selesai); 

                $total_harga = $car->tarif_sewa_per_hari * $days;

                // Insert data rental
                Rental::create([
                    'user_id' => $user->id,
                    'car_id' => $car->id,
                    'tanggal_mulai' => $tanggal_mulai,
                    'tanggal_selesai' => $tanggal_selesai,
                    'total_harga' => $total_harga,
                    'status_rental' => 'berjalan',
                ]);
            }
        }
    }
}
