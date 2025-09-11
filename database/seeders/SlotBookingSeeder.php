<?php

namespace Database\Seeders;

use App\Models\SlotBooking;
use Illuminate\Database\Seeder;

class SlotBookingSeeder extends Seeder
{
    public function run()
    {
        SlotBooking::factory()->count(100)->create();
    }
}
