<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    // The attributes that are mass assignable.
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'plate_number',
        'driver_name',
        'status',
        'assigned_to',
    ];

    // Optional: default values for new records
    protected $attributes = [
        'status' => 'available', // or any default you prefer
    ];

    // Optional: timestamps (true by default)
    public $timestamps = true;
}
