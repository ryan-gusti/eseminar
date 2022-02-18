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
        'user_id' => $this->faker->numberBetween(2,4),
        'slug' => $this->faker->slug(),
        'description' => base64_encode($this->faker->paragraph()),
        'banner' => 'default.jpg',
        'quota' => $this->faker->randomNumber(3, true),
        'time' => $this->faker->dateTimeBetween('+2 day', '+1 week'),
        'location_link' => $this->faker->url(),
        'price' => $this->faker->randomNumber(5, true),
        'type' => 'online',
        'status' => 'open'
        ];
    }
}
