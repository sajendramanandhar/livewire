<?php

namespace Database\Seeders;

use App\Models\User;
use Closure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'developer',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'remember_token' => Str::random(30),
            ]
        );

        User::factory()
            ->count(1000)
            ->create([
                'created_at' => $this->getRandomDates(),
                'updated_at' => $this->getRandomDates(),
            ]);
    }

    private function getRandomDates(): Closure
    {
        return fn () => now()->subDays(rand(0, 100));
    }
}
