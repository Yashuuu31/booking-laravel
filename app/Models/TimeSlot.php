<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory, BaseModel;

    protected $fillable = [
        'name',
        'slug',
        'start_time',
        'end_time',
        'is_active'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected function casts()
    {
        return [
            'is_active' => 'boolean'
        ];
    }
}
