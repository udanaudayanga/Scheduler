<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Slot extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';


    protected $fillable = [        
        'date',
        'time',
    ];

    public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class);
    }
}
