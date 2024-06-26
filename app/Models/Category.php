<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }
}
