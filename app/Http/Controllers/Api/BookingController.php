<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use App\Http\Requests\Booking\Request as BookingRequest;
use App\Http\Resources\Booking\Collection as BookingCollection;
use App\Http\Resources\Booking\Resource as BookingResource;
use App\Traits\ApiResponser;

class BookingController extends Controller
{
    use ApiResponser;

    private BookingService $bookingService;

    public function __construct()
    {
        $this->bookingService = new BookingService;
    }

    public function index()
    {
        $data = $this->bookingService->collection();
        return new BookingCollection($data);
    }

    public function show(int $id)
    {
        $data = $this->bookingService->resource($id);
        
        return new BookingResource($data);
    }

    public function store(BookingRequest $request)
    {
        $data = $this->bookingService->store($request->validated());

        return $this->success($data);
    }

    public function update(int $id, BookingRequest $request)
    {
        $data = $this->bookingService->update($id, $request->validated());

        return $this->success($data);
    }

    public function destroy(int $id)
    {
        $data = $this->bookingService->destroy($id);

        return $this->success($data);
    }
}
