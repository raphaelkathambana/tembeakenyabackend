<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'map_data_id', // This should be a foreign key to MapData
        'distance',
        'estimated_duration',
        'group_id',
        'user_id',
        'waypoints',
        'image_id'
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'waypoints' => 'array', // Cast waypoints as an array
    ];


    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function mapData()
    {
        return $this->belongsTo(MapData::class, 'map_data_id');
    }
}
