<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHike extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'hike_fee',
        'group_id',
        'hike_id',
        'guide_id',
        'hike_date',
    ];

    protected $casts = [
        'hike_date' => 'datetime:Y-m-d',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function hike()
    {
        return $this->belongsTo(Hike::class);
    }

    public function guide()
    {
        return $this->belongsTo(User::class, 'guide_id');
    }

    public function attendees()
    {
        return $this->hasMany(GroupHikeAttendee::class);
    }
}
