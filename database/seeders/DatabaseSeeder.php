<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'cmdpy2@gmail.com',
            'password' => Hash::make('0000')
        ]);

        $options = Option::factory(10)->create();
        Property::factory(20)
            ->hasAttached($options->random(3))
            ->create();
        Property::factory()->sold()->create();
    }
}
