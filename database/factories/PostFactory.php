<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(rand(4, 8));
        $status = fake()->randomElement(['draft', 'published']);

        return [
            'category_id' => Category::query()->inRandomOrder()->value('id'),
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title).'-'.fake()->unique()->numerify('####'),
            'excerpt' => fake()->paragraph(),
            'body' => collect(fake()->paragraphs(rand(5, 12)))
                ->map(fn (string $paragraph) => '<p>'.$paragraph.'</p>')
                ->implode("\n"),
            'featured_image' => null,
            'status' => $status,
            'published_at' => $status === 'published'
                ? fake()->dateTimeBetween('-1 year', 'now')
                : null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }
}
