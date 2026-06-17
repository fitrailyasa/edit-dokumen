<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@editdokumen.test',
            'password' => Hash::make('password'),
        ]);

        // User::factory(99)->create();
        // Category::factory(100)->create();
        // Tag::factory(100)->create();

        // Post::factory(100)->create()->each(function (Post $post) {
        //     $post->tags()->attach(
        //         Tag::query()->inRandomOrder()->limit(rand(1, 5))->pluck('id')
        //     );
        // });

        SiteSetting::factory()->create([
            'title' => 'EditDokumen.id',
            'tagline' => 'Jasa Edit PDF, Scan & Makalah Online',
            'description' => 'Jasa profesional edit PDF, scan dokumen, dan pembuatan makalah online murah & cepat. Solusi olah dokumen digital terpercaya di Indonesia dengan layanan 24 jam.',
            'email' => 'info@editdokumen.test',
            'whatsapp' => '6287777638865',
            'phone' => '+6287777638865',
            'address' => 'Jakarta, Indonesia',
        ]);

        $this->call(PageSeeder::class);
    }
}
