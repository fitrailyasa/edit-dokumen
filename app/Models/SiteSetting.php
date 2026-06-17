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
}
