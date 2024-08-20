<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->isMethod('POST')) {
            return $this->storeValidate();
        } else if($this->isMethod('PUT')) {
            return $this->updateValidate();
        }
        
        return [
            //
        ];
    }

    private function storeValidate()
    {
        return [
            'time_slot_id' => "required|exists:time_slots,id",
            'customer_name' => "required|max:255",
            'customer_email' => "required|email|max:255",
            'description' => "nullable|max:2000",
            'booking_date' => "required|date",
            'start_time' => "required",
            'end_time' => "required",
        ];
    }

    private function updateValidate()
    {
        return [
            'time_slot_id' => "required|exists:time_slots,id",
            'customer_name' => "required|max:255",
            'customer_email' => "required|email|max:255",
            'description' => "nullable|max:2000",
            'booking_date' => "required|date",
            'start_time' => "required",
            'end_time' => "required",
        ];
    }
}
