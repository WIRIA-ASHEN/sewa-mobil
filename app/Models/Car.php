<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
        'model',
        'nomor_plat',
        'tarif_sewa_per_hari',
        'status',
    ];

    // Relasi: Car memiliki banyak Rentals
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
