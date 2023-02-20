<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = 
    [
        'booking_id',
        'masterId',
        'property_id',
        'room_id',
        'unit_id',
        'roomQty',
        'offer_id',
        'status',
        'arrival',
        'departure',
        'numAdult',
        'numChild',
        'title',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postcode',
        'country',
        'comments',
        'notes',
        'messages',
        'statusCode',
        'lang',
        'referer',
        'apiSourceId',
        'apiSource',
        'apiReference',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','propId');
    }

    public function messages()
    {
        return $this->hasMany(Message::class,'booking_id','booking_id');
    }
}


