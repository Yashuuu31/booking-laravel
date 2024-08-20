<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, BaseModel;

    protected $fillable = [
        'time_slot_id',
        'customer_name',
        'customer_email',
        'description',
        'booking_date',
        'start_time',
        'end_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Model's Relationships
     */
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }
}
