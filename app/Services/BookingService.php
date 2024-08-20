<?php

namespace App\Services;

use App\Exceptions\ErrorException;
use App\Models\Booking;
use App\Models\TimeSlot;

class BookingService
{
    private Booking $booking;

    public function __construct()
    {
        $this->booking = new Booking;
    }

    public function collection(array $inputs = [])
    {
        $bookings = $this->booking->setQB()->get();

        return $bookings;
    }

    public function resource(int $id)
    {
        $booking = $this->booking->setQB()->findOrFail($id);

        return $booking;
    }

    public function store(array $inputs)
    {
        if ($this->checkIsBooked($inputs)) {
            throw new ErrorException(__('message.bookingSlotNotAvailable'));
        }

        $this->booking->create([
            'time_slot_id' => $inputs['time_slot_id'],
            'customer_name' => $inputs['customer_name'],
            'customer_email' => $inputs['customer_email'],
            'description' => $inputs['description'] ?? null,
            'booking_date' => $inputs['booking_date'],
            'start_time' => $inputs['start_time'],
            'end_time' => $inputs['end_time'],
        ]);

        $data['message'] = __('message.bookingSuccess');
        return $data;
    }

    public function update(int $id, array $inputs) {

        if ($this->checkIsBooked($inputs, $id)) {
            throw new ErrorException(__('message.bookingSlotNotAvailable'));
        }

        $this->resource($id)->update([
            'time_slot_id' => $inputs['time_slot_id'],
            'customer_name' => $inputs['customer_name'],
            'customer_email' => $inputs['customer_email'],
            'description' => $inputs['description'] ?? null,
            'booking_date' => $inputs['booking_date'],
            'start_time' => $inputs['start_time'],
            'end_time' => $inputs['end_time'],
        ]);

        $data['message'] = __('message.bookingUpdateSuccess');
        return $data;
    }

    public function destroy(int $id)
    {
        $this->resource($id)->delete();

        $data['message'] = __('message.bookingDeleteSuccess');
        
        return $data;
    }

    private function checkIsBooked(array $inputs, int $bookingId = null)
    {
        $timeSlot = TimeSlot::find($inputs['time_slot_id']);
        if (!$timeSlot) {
            return false;
        }

        $conflictingSlots = [
            'full_day' => ['morning', 'evening', 'full_day'],
            'morning' => ['full_day', 'morning'],
            'evening' => ['full_day', 'evening'],
        ];

        $existingBooking = Booking::where('booking_date', $inputs['booking_date'])
            ->whereHas('timeSlot', function ($query) use ($conflictingSlots, $timeSlot) {
                $query->whereIn('slug', $conflictingSlots[$timeSlot->slug] ?? []);
            });

        if (!empty($bookingId)) {
            $existingBooking = $existingBooking->where('id', '!=', $bookingId);
        }

        $existingBooking = $existingBooking->exists();

        return $existingBooking;
    }
}
