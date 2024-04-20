<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\product;

class productFactory extends Factory
{
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => $this->faker->word,
            'sub_category' => $this->faker->word,
            'name_en' => $this->faker->word,
            'name_ar' => $this->faker->word,
            'manufacturing_country' => $this->faker->country,
            'logo_url' => $this->faker->imageUrl,
        ];
    }
}
