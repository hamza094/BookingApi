<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\ValidForRange;
use Illuminate\Database\Eloquent\Model;

class ApartmentPrice extends Model
{
    use HasFactory, ValidForRange;

    protected $fillable = ['apartment_id', 'start_date', 'end_date', 'price'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
