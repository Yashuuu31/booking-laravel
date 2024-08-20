<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Full Day",
                'slug' => "full_day",
                'start_time' => "08:00:00",
                'end_time' => "20:00:00",
                'is_active' => true,
            ],
            [
                'name' => "Morning",
                'slug' => "morning",
                'start_time' => "08:00:00",
                'end_time' => "12:00:00",
                'is_active' => true,
            ],
            [
                'name' => "Evening",
                'slug' => "evening",
                'start_time' => "16:00:00",
                'end_time' => "20:00:00",
                'is_active' => true,
            ],
        ];

        TimeSlot::insert($data);
    }
}
