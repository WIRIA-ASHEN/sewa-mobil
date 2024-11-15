<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnCar extends Model
{
    use HasFactory;

    protected $table = 'returns';

    protected $fillable = [
        'rental_id',
        'tanggal_pengembalian',
        'jumlah_hari',
        'total_biaya',
    ];

    // Relasi: Return dimiliki oleh Rental
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }
}
