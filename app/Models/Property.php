<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = 
    [
        'user_id',
        'name',
        'propId',
        'propTypeId',
        'ownerId',
        'currency',
        'address',
        'city',
        'state',
        'country',
        'postcode',
        'latitude',
        'longitude',
        'room_name',
        'qty',
        'roomId',
        'minPrice',
        'maxPeople',
        'maxAdult',
        'maxChildren',
        'unitAllocationPerGuest',
        'unitNames'
        
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
