<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'tagline',
        'description',
        'logo',
        'whatsapp',
        'instagram',
        'tiktok',
        'email',
        'facebook',
        'twitter',
        'phone',
        'address',
    ];

    public static function current(): self
    {
        return static::firstOrCreate([]);
    }

    public function whatsappNumber(): string
    {
        $number = preg_replace('/\D/', '', (string) ($this->whatsapp ?: '6287777638865'));

        return $number !== '' ? $number : '6287777638865';
    }

    public function whatsappUrl(?string $message = null): string
    {
        $defaultMessage = 'Halo EditDokumen.id, saya tertarik dengan layanan olah dokumen Anda. Bisa dibantu?';

        return 'https://wa.me/'.$this->whatsappNumber().'?text='.rawurlencode($message ?? $defaultMessage);
    }

    public function whatsappInternational(): string
    {
        return '+'.$this->whatsappNumber();
    }
}
