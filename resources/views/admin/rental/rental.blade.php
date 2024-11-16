@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Mobil</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->car->merek }}</td>
                        <td>{{ $rental->car->model }}</td>
                        <td>{{ $rental->tanggal_mulai }}</td>
                        <td>{{ $rental->tanggal_selesai }}</td>
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
                        </td>

                        {{-- <td>
                            @if ($rental->status === 'berjalan')
                                <form action="{{ route('user.rental.return', $rental->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Kembalikan</button>
                                </form>
                            @endif
                        </td> --}}
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
@endsection
