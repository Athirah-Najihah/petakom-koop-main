<?php

namespace Database\Seeders;

use App\Models\Roster;
use Illuminate\Database\Seeder;

class RosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roster::factory()
            ->count(5)
            ->create();
    }
}
