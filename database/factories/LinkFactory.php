<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'link' => fake()->url(),
            'name' => fake()->name(),
        ];
    }
}
