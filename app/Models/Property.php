<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    

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


    protected $casts = [
        'sold' => 'boolean',
        'created_at' => 'string',
        'updated_at' => 'string',
        'deleted_at' => 'string',
    ];

    public function options(){
        return $this->belongsToMany(Option::class);
    }


    public function getSlug(){
        return Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder){
        return $builder->where('sold', false);
    }
    public function scopeLatest(Builder $builder){
        return $builder->orderBy('created_at', 'desc');
    }
}
