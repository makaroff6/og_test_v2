<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GoodPropertyValue extends Model
{
    protected $fillable = ['value'];

    public function property(): HasOne
    {
        return $this->hasOne(GoodProperty::class, 'id', 'property_id');
    }
}
