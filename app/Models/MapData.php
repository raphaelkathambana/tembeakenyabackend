<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'description',
        'image',
        'waypoints', // New field for storing waypoints
    ];

    protected $casts = [
        'waypoints' => 'array', // Cast waypoints as an array
    ];


    /**
     * returns the related hike
     */
    // public function hike()
    // {
    //     return $this->belongsTo(Hike::class);
    // }
    public function hikes()
    {
        return $this->hasMany(Hike::class, 'map_data_id');
    }
}
