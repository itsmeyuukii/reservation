<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    // Define the table associated with the model (optional if the table name is 'rooms')
    protected $table = 'room';

    // Specify the primary key if it's not 'id' (optional)
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'room_name',
        'pax',
        'price',
    ];

    // If you want to prevent mass assignment, you can use the guarded property instead
    // protected $guarded = [];

    // Define any relationships, mutators, or other model logic here
}
