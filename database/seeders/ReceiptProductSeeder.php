<?php

namespace Database\Seeders;

use App\Models\ReceiptProduct;
use Illuminate\Database\Seeder;

class ReceiptProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiptProduct::factory()
            ->count(5)
            ->create();
    }
}
