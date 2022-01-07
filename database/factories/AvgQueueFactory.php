<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AvgQueue;

class AvgQueueFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = AvgQueue::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'minutes' => $this->faker->randomNumber(),
            'service_id' => \App\Models\ScheduleService::factory(),
        ];
    }
}
