<?php

namespace App\Http\Resources\Booking;

use App\Models\Booking;
use App\Traits\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TimeSlot\Resource as TimeSlotResource; 

class Resource extends JsonResource
{
    use ApiResource;

    public $model = Booking::class;

    public function toArray(Request $request): array
    {
        $data = $this->getFields();
        $data['time_slot'] = new TimeSlotResource($this->whenLoaded('timeSlot'));
        return $data;
    }
}
