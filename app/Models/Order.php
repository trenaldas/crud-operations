<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedPriceAttribute(): float
    {
        return number_format($this->total_price / 100, 2);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
