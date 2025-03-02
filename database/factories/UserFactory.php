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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'nama' => fake()->name(),
            'username' => 'ifs' . fake()->unique()->numerify(),
            'nim' => '11S' . fake()->unique()->numerify('########'),
            'prodi' => fake()->randomElement(['S1 Informatika', 'S1 Sistem Informasi', 'S1 Teknik Elektro', 'S1 Teknik Bioproses', 'S1 Manajemen Rekayasa']),
            'tahun_lulus' => fake()->year(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
