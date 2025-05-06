<?php

namespace Database\Factories;

use App\Faker\CarMarkProvider;
use App\Faker\CarModelProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new CarMarkProvider($faker));
        $faker->addProvider(new CarModelProvider($faker));
        return [
            'user_id' => User::where('role', 'пользователь')->inRandomOrder()->first()->id,
            'full_name' => $this->faker->lastName . ' ' . $this->faker->firstName . ' '. 'Александрович',
            'mark' => $faker->carMarks(),
            'model' => $faker->carModels(),
            'state_number' => "В004КО",
            'region' => str_pad($this->faker->numberBetween(1, 100), 2, '0', STR_PAD_LEFT),
            'phone_number' => $this->faker->phoneNumber(),
            'created_at' => now(),
        ];
    }
}
