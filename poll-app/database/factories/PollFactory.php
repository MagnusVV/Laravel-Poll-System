<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class PollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Poll::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::factory()->create();

        return [
            'poll_title' => fake()->title(),
            'poll_description' => fake()->paragraph(),
            'date_closing' => fake()->dateTimeBetween('now', '+1 month'),
            'no_of_allowed_votes' => fake()->numberBetween(3, 5),
            'poll_closed' => false,
            'user_id' => $user->id
        ];
    }
}
