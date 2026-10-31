<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['whatsapp_number', 'address', 'opening_hours'];

    public static function current(): self
    {
        return static::firstOrFail();
    }

    public function whatsappUrl(?string $message = null): string
    {
        $url = 'https://wa.me/'.$this->normalizedNumber();

        return $message ? $url.'?text='.rawurlencode($message) : $url;
    }

    private function normalizedNumber(): string
    {
        $digits = preg_replace('/\D/', '', $this->whatsapp_number);

        return str_starts_with($digits, '0') ? '62'.substr($digits, 1) : $digits;
    }
}
