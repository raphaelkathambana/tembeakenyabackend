<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'guide_id'
    ];

    /**
     * Get the guide (admin) of the group.
     */
    public function guide()
    {
        return $this->belongsTo(User::class, 'guide_id');
    }

    /**
     * Get the members of the group.
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'users_groups');
    }

    /**
     * Get the hikes related to the group.
     */
    public function hikes()
    {
        return $this->hasMany(Hike::class);
    }
}
