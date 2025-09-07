<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GoodRemain extends Model
{
    protected $fillable = ['qty', 'good_id'];

    public function good(): HasOne
    {
        return $this->hasOne(Good::class, 'id', 'good_id');
    }
}
