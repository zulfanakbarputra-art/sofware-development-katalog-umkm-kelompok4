<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'photo', 'status'];

    public function sizes(): HasMany
    {
        return $this->hasMany(ProductSize::class)->orderBy('id');
    }

    public function isAvailable(): bool
    {
        return $this->status === 'tersedia';
    }

    public function canBeOrdered(): bool
    {
        return $this->isAvailable() && $this->sizes->isNotEmpty();
    }

    public function statusLabel(): string
    {
        return $this->isAvailable() ? 'Tersedia' : 'Habis';
    }

    public function defaultSize(): ?ProductSize
    {
        return $this->sizes->first();
    }
}
