<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\PropertyObserver;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory;
    use HasEagerLimit;
    use InteractsWithMedia;

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(800);
    }
}
