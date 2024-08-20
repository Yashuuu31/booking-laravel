<?php

namespace App\Http\Resources\TimeSlot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    public $collects = Resource::class;

    public function toArray(Request $request)
    {
        return $this->collection;
    }
}
