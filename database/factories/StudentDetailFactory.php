<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\studentDetail>
 */
class StudentDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // total jam maksimum
        $total = 24;

        // acak sebagian dari total
        $study = fake()->randomFloat(2, 0, $total);
        $total -= $study;

        $sleep = fake()->randomFloat(2, 0, $total);
        $total -= $sleep;

        $extracurricular = fake()->randomFloat(2, 0, $total);
        $total -= $extracurricular;

        $physical = fake()->randomFloat(2, 0, $total);
        $total -= $physical;

        // sisa total dikasih ke social activity
        $social = $total;

        return [
            'id_user'                 => User::factory(),
            'class'                   => fake()->randomElement(['PPTI']),
            'study_hours_per_day'     => $study,
            'sleep_hours_per_day'     => $sleep,
            'extracurricular_hours'   => $extracurricular,
            'physical_activity_hours' => $physical,
            'social_activity_hours'   => $social,
            'gpa'                     => fake()->randomFloat(2, 0, 4),
        ];
    }
}
