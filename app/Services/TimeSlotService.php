<?php

namespace App\Services;

use App\Models\TimeSlot;

class TimeSlotService
{
    private TimeSlot $timeSlot;

    public function __construct()
    {
        $this->timeSlot = new TimeSlot;
    }

    public function collection()
    {
        $timeSlots = $this->timeSlot->setQB()->get();

        return $timeSlots;
    }

    public function resource(int $id)
    {
        $timeSlot = $this->timeSlot->setQB()->findOrFail($id);

        return $timeSlot;
    }
}