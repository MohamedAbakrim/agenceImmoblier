<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

class Property extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        "description",
        "surface",
        "rooms",
        "bedrooms",
        "floor",
        "price",
        'city',
        'adress',
        'postal_code',
        "sold"
    ];

    public function options(){
        return $this->belongsToMany(Option::class);
    }
}
