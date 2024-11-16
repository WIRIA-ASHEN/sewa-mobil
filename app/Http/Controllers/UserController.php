<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'tersedia')->get();
        return view('user.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('user.show', compact('car'));
    }


    public function rental(Request $request, $id)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today', // Minimal harus hari ini atau setelahnya
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai', // Bisa sama dengan tanggal mulai
        ]);

        $car = Car::findOrFail($id);

        // Cek apakah mobil tersedia
        if ($car->status !== 'tersedia') {
            return redirect()->back()->with('error', 'Mobil tidak tersedia.');
        }

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        // Pastikan tanggal mulai dan tanggal selesai bukan hari Minggu
        if ($tanggalMulai->isSunday() || $tanggalSelesai->isSunday()) {
            return redirect()->back()->with('error', 'Mobil tidak dapat disewa pada hari Minggu.');
        }

        // Cek apakah mobil sudah disewa pada rentang tanggal tersebut
        $existingRental = Rental::where('car_id', $car->id)
            ->where(function ($query) use ($tanggalMulai, $tanggalSelesai) {
                $query->whereBetween('tanggal_mulai', [$tanggalMulai, $tanggalSelesai])
                    ->orWhereBetween('tanggal_selesai', [$tanggalMulai, $tanggalSelesai])
                    ->orWhere(function ($query) use ($tanggalMulai, $tanggalSelesai) {
                        // Cek apakah ada pemesanan yang persis pada tanggal mulai dan selesai yang sama
                        $query->where('tanggal_mulai', '=', $tanggalMulai)
                            ->where('tanggal_selesai', '=', $tanggalSelesai);
                    });
            })
            ->first();

        if ($existingRental) {
            return redirect()->back()->with('error', 'Mobil tidak tersedia pada tanggal yang dipilih.');
        }

        // Hitung total harga berdasarkan jumlah hari sewa
        $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1; // Hitung 1 hari jika tanggal sama
        $totalHarga = $jumlahHari * $car->tarif_sewa_per_hari;

        // Membuat rental baru
        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'total_harga' => $totalHarga,
            'status_rental' => 'pending', // Status yang digunakan
        ]);

        // Update status mobil menjadi 'disewa'
        $car->update(['status' => 'disewa']);

        return redirect()->route('user.rentals')->with('success', 'Mobil berhasil disewa, silahkan datang dihari pesanan anda untuk mengambil mobilnya.');
    }


    public function rentals()
    {
        $rentals = Rental::where('user_id', Auth::id())->get();
        return view('user.rentals', compact('rentals'));
    }

}
