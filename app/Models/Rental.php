<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'total_harga',
    ];

    // Relasi: Rental dimiliki oleh User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Rental dimiliki oleh Car
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    // Relasi: Rental memiliki satu Return
    public function return(): HasOne
    {
        return $this->hasOne(ReturnCar::class);
    }
}
