<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TimeSlotService;
use Illuminate\Http\Request;
use App\Http\Resources\TimeSlot\Collection as TimeSlotCollection;
use App\Http\Resources\TimeSlot\Resource as TimeSlotResource;

class TimeSlotController extends Controller
{
    private TimeSlotService $timeSlotService;

    public function __construct()
    {
        $this->timeSlotService = new TimeSlotService;
    }

    public function index()
    {
        $data = $this->timeSlotService->collection();

        return new TimeSlotCollection($data);
    }
    
    public function show(int $id)
    {
        $data = $this->timeSlotService->resource($id);

        return new TimeSlotResource($data);
    }
}
