<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Good extends Model
{
    protected $fillable = [
        'price',
        'name',
        'status'
    ];

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(GoodPropertyValue::class);
    }

    public function remains(): HasMany
    {
        return $this->hasMany(GoodRemain::class);
    }

    public function brand(): BelongsToMany
    {
        return $this->belongsToMany(GoodPropertyValue::class)
            ->whereHas('property', fn ($query)  => $query->where('name', 'Бренд'))
            ->limit(1);
    }
}
