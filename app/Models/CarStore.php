<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarStore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'is_open',
        'is_full',      
        'address',
        'phone_number',
        'cs_name',
        'city_id',

    ];

    public function storeServices(): HasMany
    {
        return $this->hasMany(StoreService::class, 'car_store_id');
    }

    public function Photos(): HasMany
    {
        return $this->hasMany(StorePhoto::class, 'car_store_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}

