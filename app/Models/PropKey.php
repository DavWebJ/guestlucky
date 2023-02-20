<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropKey extends Model
{
    use HasFactory;
    protected $table = "properties_key";
    protected $guarded = [];
    protected $fillable = 
    [
        'user_id',
        'propkey' 
    ];


    public function properties()
    {
        return $this->belongsTo(Property::class,'prop_id');
    }


}
