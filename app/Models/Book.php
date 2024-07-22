<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'id';
    protected $fillable = [
        'room_name',
        'client_name',
        'pax',
        'check_in',
        'check_out',
    ];

    // Method to check for overlapping bookings
    public function hasOverlap($roomName, $checkIn, $checkOut)
    {
        return $this->where('room_name', $roomName)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($query) use ($checkIn, $checkOut) {
                          $query->where('check_in', '<=', $checkIn)
                                ->where('check_out', '>=', $checkOut);
                      });
            })->exists();
    }
}
