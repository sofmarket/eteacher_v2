<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dispute;
use App\Models\User;
use App\Models\SlotBooking;

class DisputeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have users and bookings
        $this->ensureRequiredData();

        Dispute::factory()->count(10)->create();

        $this->command->info('Created 10 sample disputes.');
    }

    /**
     * Ensure we have the required data (users, bookings)
     */
    private function ensureRequiredData(): void
    {
        // Create admin user if none exists
        if (!User::where('type', 'admin')->exists()) {
            User::factory()->create([
                'email' => 'admin@test.com',
                'password' => 'password',
                'type' => 'admin',
            ]);
        }

        // Create some bookings if none exist
        if (SlotBooking::count() < 5) {
            SlotBooking::factory()->count(10)->create();
        }
    }

}
