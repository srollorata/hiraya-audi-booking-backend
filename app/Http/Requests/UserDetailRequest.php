<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
{
    /**
     * Determine if the userdetails is authorized to make this request.
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
        
        if(request()->routeIs('userdetails.update')) {
            return [
                'about' => 'string|max:255',
            ];
        } else if(request()->routeIs('userdetails.store')) {
            return [
                'user_id'   => 'required|integer',
                'about'     => 'string|max:255',
                'company'   => 'string|max:255',
                'job'       => 'string|max:255',
                'country'   => 'string|max:255',
                'address'   => 'string|max:255',
                'phone'     => 'max:255',
            ];
        } else if (request()->routeIs('userdetails.about')) {
            return [
                'about'      => 'string',
            ];
        } else if (request()->routeIs('userdetails.company')) {
            return [
                'company'      => 'string',
            ];
        } else if (request()->routeIs('userdetails.job')) {
            return [
                'job'      => 'string',
            ];
        } else if (request()->routeIs('userdetails.country')) {
            return [
                'country'      => 'string',
            ];
        } else if (request()->routeIs('userdetails.address')) {
            return [
                'address'      => 'string',
            ];
        } else if (request()->routeIs('userdetails.phone')) {
            return [
                'phone'      => 'string',
            ];
        }
    }
}
