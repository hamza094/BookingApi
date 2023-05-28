<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\PropertyObserver;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Property extends Model
{
    use HasFactory;
    use HasEagerLimit;

     public static function booted()
    {
        parent::booted();
 
        self::observe(PropertyObserver::class);
    }

       protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function address(): Attribute
    {
        return new Attribute(
            get: fn () => $this->address_street
                 . ', ' . $this->address_postcode
                 . ', ' . $this->city->name
        );
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
