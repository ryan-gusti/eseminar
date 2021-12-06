<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->sentence(),
        'slug' => $this->faker->slug(),
        'description' => $this->faker->paragraph(),
        'banner' => $this->faker->imageUrl(640, 480, 'events', true),
        'quota' => $this->faker->randomNumber(3, true),
        'time' => $this->faker-> dateTime(),
        'location' => $this->faker->word(),
        'link' => $this->faker->url(),
        'price' => $this->faker->randomNumber(5, true),
        'status' => 'open'
        ];
    }
}
