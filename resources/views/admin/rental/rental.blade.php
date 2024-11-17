@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Rental</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Nomor Plat</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Hari</th>
                    <th>Status
                        <i class="bi bi-question-circle" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            title="Product Status" data-bs-content="Klik button pending ketika persayaratan sudah lengkap.">
                        </i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                    Carbon::setLocale('id');
                @endphp
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->user->nama }}</td>
                        <td>{{ $rental->car->merek }}</td>
                        <td>{{ $rental->car->model }}</td>
                        <td>{{ $rental->car->nomor_plat }}</td>
                        <td>{{ Carbon::parse($rental->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                        <td>{{ Carbon::parse($rental->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                        <td>{{ Carbon::parse($rental->tanggal_mulai)->diffInDays(Carbon::parse($rental->tanggal_selesai)) + 1 }}
                            hari</td>
                        <td>
                            @if ($rental->status_rental == 'berjalan')
                                <button class="btn btn-primary">{{ ucfirst($rental->status_rental) }}</button>
                            @elseif($rental->status_rental == 'pending')
                                <button class="btn btn-warning"
                                    onclick="updateStatus({{ $rental->id }})">{{ ucfirst($rental->status_rental) }}</button>
                            @elseif($rental->status_rental == 'selesai')
                                <button class="btn btn-success">{{ ucfirst($rental->status_rental) }}</button>
                            @else
                                <button class="btn btn-secondary">{{ ucfirst($rental->status_rental) }}</button>
                            @endif

                            <form action="{{ route('admin.rental.hapus', $rental->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function updateStatus(rentalId) {
            if (confirm('Apakah Anda yakin ingin mengubah status rental ini ke "Berjalan"?')) {
                fetch(`/mobil/rental/${rentalId}/berjalan`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Status berhasil diubah.');
                            location.reload(); // Reload halaman untuk melihat perubahan
                        } else {
                            alert('Terjadi kesalahan: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan.');
                    });
            }
        }
    </script>

    <script>
        // Initialize Bootstrap Popovers
        document.addEventListener('DOMContentLoaded', function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        });
    </script>
@endsection
