<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->date();
        $endtDate =  $this->faker->dateTimeBetween($startDate, $startDate . '+7 days');

        return [
            'user_id' => User::all()->random()->id,
            'name'    => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'duration'    => $this->faker->numberBetween(1,9),
            'priority'    => $this->faker->randomElement(['low', 'medium', 'high']),
            'state'       => $this->faker->randomElement(['ongoing', 'completed']),
            'start_date'  => $startDate,
            'end_date'    => $endtDate
        ];
    }
}
