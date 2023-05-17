<?php

namespace Database\Factories;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivreFactory extends Factory
{
    protected $model = Livre::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
            'year' => $this->faker->year,
        ];
    }
}
