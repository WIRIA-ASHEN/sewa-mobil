<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use App\Models\ReturnCar;
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
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today', // Minimal harus hari ini atau setelahnya
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai', // Bisa sama dengan tanggal mulai
        ]);

        $car = Car::findOrFail($id);

        if ($car->status !== 'tersedia') {
            return redirect()->back()->with('error', 'Mobil tidak tersedia.');
        }

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);

        if ($tanggalMulai->isSunday() || $tanggalSelesai->isSunday()) {
            return redirect()->back()->with('error', 'Mobil tidak dapat disewa pada hari Minggu.');
        }

        $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1; // Tambah 1 hari jika tanggal sama
        $totalHarga = $jumlahHari * $car->tarif_sewa_per_hari;

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'total_harga' => $totalHarga,
            'status_rental' => 'pending',
        ]);

        $car->update(['status' => 'disewa']);

        return redirect()->route('user.rentals')->with('success', 'Mobil berhasil disewa, silahkan datang di hari pesanan Anda untuk mengambil mobil.');
    }




    public function rentals()
    {
        $rentals = Rental::where('user_id', Auth::id())->get();
        return view('user.rentals', compact('rentals'));
    }

    public function detailRentals($id)
    {
        $rental = Rental::with(['car', 'return'])
            ->where('id', $id)
            ->where('user_id', auth()->id()) 
            ->first();

        if (!$rental) {
            return redirect()->route('user.rentals')->with('error', 'Rental tidak ditemukan.');
        }

        return view('user.detail', compact('rental'));
    }

    public function return()
    {
        return view('user.return');
    }

    public function returnProcess(Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required|string'
        ]);

        $rental = Rental::with('car')
            ->whereHas('car', function ($query) use ($request) {
                $query->where('nomor_plat', $request->nomor_plat);
            })
            ->where('user_id', auth()->id())
            ->where('status_rental', 'berjalan')
            ->first();

        if (!$rental) {
            return redirect()->back()->with('error', 'Mobil tidak ditemukan atau belum disewa.');
        }


        $tanggalPengembalian = Carbon::now();
        $days = Carbon::parse($rental->tanggal_mulai)->diffInDays($rental->tanggal_selesai) + 1;
        $biayaSewa = $days * $rental->car->tarif_sewa_per_hari;

        $return = ReturnCar::create([
            'rental_id' => $rental->id,
            'tanggal_pengembalian' => $tanggalPengembalian,
            'jumlah_hari_sewa' => $days,
            'biaya_sewa' => $biayaSewa,
        ]);

        $rental->update(['status_rental' => 'selesai']);

        $rental->car->update(['status' => 'tersedia']);

        return redirect()->route('user.rentals')->with('success', 'Mobil berhasil dikembalikan.')->with('return', $return);

    }

}
