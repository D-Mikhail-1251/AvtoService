<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Master>
 */
class MasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', '=', 'пользователь')->inRandomOrder()->first()->id,
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'work_experience' => $this->faker->dateTime(),
            'image' => 'https://avatars.mds.yandex.net/i?id=d6493f0f6e42938ed8678a1ffb2b2415_l-4821375-images-thumbs&n=13',
        ];
    }
}
