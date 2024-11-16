<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\ReturnCar;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahmobildisewa = Car::where('status', 'disewa')->count();
        $jumlahmobiltersedia = Car::where('status', 'tersedia')->count();
        $jumlahmobildirental = Rental::where('status_rental', 'berjalan')->count();
        $jumlahPengembalian = ReturnCar::count();

        return view('admin.dashboard', compact(
            'jumlahmobildisewa',
            'jumlahmobiltersedia',
            'jumlahPengembalian',
            'jumlahmobildirental'
        ));
    }

    public function mobil(Request $request)
    {
        $cars = Car::all();
        $search = $request->input('search');
        $status = $request->input('status');

        // Query untuk mencari mobil berdasarkan merek, model, atau status
        $cars = Car::query()
            ->when($search, function ($query, $search) {
                return $query->where('merek', 'like', "%$search%")
                    ->orWhere('model', 'like', "%$search%");
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();
        return view('admin.mobil.mobil', compact('cars', 'search', 'status'));
    }

    public function tambah()
    {
        return view('admin.mobil.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'nomor_plat' => 'required|string',
            'tarif_sewa_per_hari' => 'required|integer',
        ]);

        Car::create($request->all());

        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.mobil.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'nomor_plat' => 'required|string',
            'tarif_sewa_per_hari' => 'required|integer',
            'status' => 'required|string'
        ]);

        $car->update($request->all());

        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil diupdate!');
    }

    public function hapus($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.mobil')->with('success', 'Mobil berhasil dihapus!');
    }

    public function rental()
    {
        $rentals = Rental::all();
        return view('admin.rental.rental', compact('rentals'));
    }

    public function rental_update($id)
    {
        // Cari rental berdasarkan ID
        $rental = Rental::findOrFail($id);

        // Pastikan status saat ini adalah 'pending'
        if ($rental->status_rental == 'pending') {
            // Update status menjadi 'berjalan'
            $rental->update([
                'status_rental' => 'berjalan'
            ]);

            // Return response JSON
            return response()->json(['success' => true]);
        }

        // Jika status bukan 'pending', return response error
        return response()->json(['success' => false, 'error' => 'Rental tidak dalam status pending.']);
    }

}
