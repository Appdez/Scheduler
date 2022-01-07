<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClientDocument;

class ClientDocumentFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = ClientDocument::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'document_id' => \App\Models\Document::factory(),
            'client_schedule_id' => \App\Models\ClientScheduler::factory(),
            'value' => $this->faker->word,
        ];
    }
}
