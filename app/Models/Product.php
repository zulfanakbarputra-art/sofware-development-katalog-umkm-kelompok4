<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'photo', 'status'];

    public function sizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }

    public function isAvailable(): bool
    {
        return $this->status === 'tersedia';
    }
}
