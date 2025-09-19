<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName'          => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'role'              => fake()->randomElement(['student', 'teacher']),
            'status'            => fake()->randomElement([0, 1]),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
        ];
    }

    public function admin()
    {
        return $this->state(fn(array $attributes) => [
            'fullName'          => 'Andi Zulfikar',
            'email'             => 'andi.zulfikar@admin.com',
            'role'              => 'admin',
            'status'            => '1',
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);
    }

    public function teacher()
    {
        return $this->state(fn(array $attributes) => [
            'fullName'          => 'Theresa Adelia Christi',
            'email'             => 'theresa.adelia@teacher.com',
            'role'              => 'teacher',
            'status'            => '1',
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);
    }

    public function student()
    {
        return $this->state(fn(array $attributes) => [
            'fullName'          => 'Steven Jayadi Wiyanto',
            'email'             => 'steven.jayadi@student.com',
            'role'              => 'student',
            'status'            => '1',
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
