<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SiteSetting>
 */
class SiteSettingFactory extends Factory
{
    protected $model = SiteSetting::class;

    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'tagline' => fake()->catchPhrase(),
            'description' => fake()->paragraph(3),
            'logo' => null,
            'whatsapp' => '62'.fake()->numerify('8##########'),
            'instagram' => 'https://instagram.com/'.fake()->userName(),
            'tiktok' => 'https://tiktok.com/@'.fake()->userName(),
            'email' => fake()->companyEmail(),
            'facebook' => 'https://facebook.com/'.fake()->userName(),
            'twitter' => 'https://twitter.com/'.fake()->userName(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }
}
