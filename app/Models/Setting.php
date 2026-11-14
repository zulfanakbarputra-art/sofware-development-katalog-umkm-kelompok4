<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['whatsapp_number', 'address', 'map_embed_url', 'opening_hours'];

    public static function current(): self
    {
        return static::firstOrFail();
    }

    public function whatsappUrl(?string $message = null): string
    {
        $url = 'https://wa.me/'.$this->normalizedNumber();

        return $message ? $url.'?text='.rawurlencode($message) : $url;
    }

    public function greetingUrl(): string
    {
        return $this->whatsappUrl('Halo kak, saya mau tanya tentang produk '.config('app.name'));
    }

    public function normalizedNumber(): string
    {
        $digits = preg_replace('/\D/', '', $this->whatsapp_number);

        return str_starts_with($digits, '0') ? '62'.substr($digits, 1) : $digits;
    }

    public function formattedNumber(): string
    {
        $digits = $this->normalizedNumber();

        return preg_replace('/^(\d{2})(\d{3})(\d{4})(.*)$/', '+$1 $2 $3 $4', $digits);
    }
}
