<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        if(request()->routeIs('booking.update')) {
            return [
                'date' => 'string|date_format:Y-m-d',
                'time' => 'string|date_format:H:i:s',
                'status' => 'required',
                'purpose' => 'string|max:255',
                'user_id' => 'exists:users,id|integer',
                'client_id' => 'exists:clients,id|integer',
            ];
        } else if(request()->routeIs('booking.store')) {
            return [
                'date'          => 'required|date_format:Y-m-d',
                'time'          => 'required|date_format:H:i:s',
                'status'        => 'required',
                'purpose'       => 'string|max:255',
                'user_id'       => 'required|exists:users,id',
                'client_id'     => 'required|exists:clients,id|integer',
                
            ];
        } else if (request()->routeIs('booking.date')) {
            return [
                'date'          => 'required|date_format:Y-m-d',
            ];
        } else if (request()->routeIs('booking.time')) {
            return [
                'time'      => 'required|date_format:H:i:s',
            ];
        } else if (request()->routeIs('booking.purpose')) {
            return [
                'purpose'      => 'required',
            ];
        } else if (request()->routeIs('booking.status')) {
            return [
                'status'      => 'required',
            ];
        } else if (request()->routeIs('booking.userid')) {
            return [
                'user_id'      => 'required|integer',
            ];
        } else if (request()->routeIs('booking.clientid')) {
            return [
                'client_id'      => 'required|integer',
            ];
        }
    }
}
