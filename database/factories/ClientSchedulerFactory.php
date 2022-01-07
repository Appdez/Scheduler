<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClientScheduler;

class ClientSchedulerFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = ClientScheduler::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'key' => $this->faker->word,
            'qr_code' => $this->faker->word,
            'contact' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'scheduled_at' => $this->faker->dateTime(),
            'scheduled_end_at' => $this->faker->dateTime(),
            'scheduled_for' => $this->faker->dateTime(),
            'scheduled_ended_at' => $this->faker->dateTime(),
            'client_id' => \App\Models\User::factory(),
            'service_id' => \App\Models\ScheduleService::factory(),
        ];
    }
}
