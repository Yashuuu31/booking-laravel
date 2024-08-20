<?php

namespace App\Http\Resources\TimeSlot;

use App\Models\TimeSlot;
use App\Traits\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    use ApiResource;

    public $model = TimeSlot::class;

    public function toArray(Request $request): array
    {
        $data = $this->getFields();
        return $data;
    }
}
