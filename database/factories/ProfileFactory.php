<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'national_id' => $this->faker->unique()->numerify('##########'),
            'avatar' => $this->faker->imageUrl(640, 480, 'user', true, 'FAKE'),
            'birth_date' => $this->faker->date('Y-m-d'),
            'user_id' => User::query()->doesntHave('profile')->inRandomOrder()->value('id'),
        ];
    }
}
