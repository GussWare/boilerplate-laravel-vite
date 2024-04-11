<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    
    protected $table = 'notification_logs';

    protected $fillable = [
        'notification_id',
        'channel_id',
        'user_id',
        'status',
        'response'
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}