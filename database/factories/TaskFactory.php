<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['waiting', 'process', 'ready', 'cancelled'];
        $status_rand = $status[array_rand($status)];
        $date_start = $status_rand === 'waiting' ? null : fake()->dateTime();
        $date_end = $date_start !== null && $status_rand !== 'process' ? fake()->dateTimeBetween($date_start) : null;
        $project = Project::all()->random()->id;

        return [
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'date_start' => $date_start,
            'date_end' => $date_end,
            'status' => $status_rand,
            'project_id' => $project
        ];
    }
}
