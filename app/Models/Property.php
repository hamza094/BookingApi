<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\PropertyObserver;

class Property extends Model
{
    use HasFactory;

     public static function booted()
    {
        parent::booted();
 
        self::observe(PropertyObserver::class);
    }

       protected $fillable = [
        'user_id',
        'name',
        'city_id',
        'address_street',
        'address_postcode',
        'lat',
        'long',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}