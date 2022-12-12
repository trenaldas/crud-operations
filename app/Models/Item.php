<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value / 100, 2),
            set: fn ($value) => (int) $value * 100,
        );
    }
}
