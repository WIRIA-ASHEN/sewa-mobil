<?php

namespace Database\Seeders;

use App\Models\Rental;
use App\Models\ReturnCar;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReturnCarSeeder extends Seeder
{
    /**
     * Seed the return cars table.
     *
     * @return void
     */
    public function run()
    {
        $rentals = Rental::where('status_rental', 'berjalan')->get();

        foreach ($rentals as $rental) {
            $days = Carbon::parse($rental->tanggal_mulai)->diffInDays($rental->tanggal_selesai);

            ReturnCar::create([
                'rental_id' => $rental->id,
                'tanggal_pengembalian' => Carbon::now(),
                'jumlah_hari_sewa' => $days,
                'biaya_sewa' => $rental->car->tarif_sewa_per_hari * $days,
            ]);

            $rental->update(['status_rental' => 'selesai']);
        }
    }
}
