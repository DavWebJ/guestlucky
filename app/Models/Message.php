<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = 
    [
        'user_id',
        'message_id',
        'booking_id',
        'room_id',
        'property_id',
        'time',
        'read',
        'message',
        'source'
    ];


    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','propId');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id','booking_id');
    }
}
