@extends('layouts.user')

@section('content')
    <style>
        form {
            margin-top: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
        }
    </style>
    <div class="container mt-5">
        <h2>Detail Mobil</h2>
        <div class="card">
            <div class="card-body">
                <h4>{{ $car->merek }} - {{ $car->model }}</h4>
                <p>Nomor Plat: {{ $car->nomor_plat }}</p>
                <p>Tarif Sewa: Rp <span id="tarif">{{ number_format($car->tarif_sewa_per_hari, 0, ',', '.') }}</span> /
                    hari</p>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('errors'))
                    <div class="alert alert-danger">{{ session('errors') }}</div>
                @endif

                <form action="{{ route('user.mobil.rental', $car->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                    </div>
                    <input type="hidden" name="status_rental" id="status_rental" value="pending">

                    <button type="submit" class="btn btn-success">Sewa Mobil</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- Tambahkan jQuery untuk perhitungan harga -->
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const tarifPerHari = {{ $car->tarif_sewa_per_hari }};

            // Ketika tanggal mulai atau tanggal selesai berubah
            $('#tanggal_mulai, #tanggal_selesai').on('change', function() {
                const tanggalMulai = $('#tanggal_mulai').val();
                const tanggalSelesai = $('#tanggal_selesai').val();

                // Pastikan kedua tanggal sudah dipilih
                if (tanggalMulai && tanggalSelesai) {
                    const startDate = new Date(tanggalMulai);
                    const endDate = new Date(tanggalSelesai);
                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) +
                        1; // Tambah 1 agar inklusif

                    // Kalkulasi total harga
                    const totalHarga = diffDays * tarifPerHari;
                    $('#total_harga').val(new Intl.NumberFormat('id-ID').format(totalHarga));
                }
            });
        });
    </script>
    <script>
    //     $(document).ready(function() {
    //         const disableSundays = (date) => {
    //             return [date.getDay() !== 0]; // 0 = Sunday
    //         };

    //         // Disable Sundays on both date pickers
    //         $('#tanggal_mulai, #tanggal_selesai').attr('min', new Date().toISOString().split('T')[0]);

    //         $('#tanggal_mulai, #tanggal_selesai').on('change', function() {
    //             const startDate = $('#tanggal_mulai').val();
    //             const endDate = $('#tanggal_selesai').val();

    //             if (new Date(startDate).getDay() === 0 || new Date(endDate).getDay() === 0) {
    //                 alert('Tanggal yang dipilih tidak boleh hari Minggu.');
    //                 $(this).val('');
    //             }
    //         });
    //     });
    // </script>
@endsection
