<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
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
    public function definition(): array
    {
        
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'is_completed' => fake()->boolean(),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'start_at' => Carbon::now(),
        ];
    }
}
