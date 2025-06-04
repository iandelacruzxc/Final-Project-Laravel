<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stall;

class StallSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Stall::create(['stall_number' => 'Stall ' . $i]);
        }
    }
}
