<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the clients is authorized to make this request.
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
        if (request()->routeIs('clients.store')) {
            return [
                'first_name'          => 'required|string|max:255',
                'last_name'           => 'required|string|max:255',
                'contact_number'      => 'required|string|max:255',
                'email'               => 'required|email|max:50',
                'affiliation_id'      => 'required|exists:affiliation,id',
            ];
        } else if (request()->routeIs('clients.firstname')) {
            return [
                'first_name'          => 'required|string|max:255',
            ];
        } else if (request()->routeIs('clients.lastname')) {
            return [
                'last_name'         => 'required|string|max:255',
            ];
        } else if (request()->routeIs('clients.contact')) {
            return [
                'contact_number'      => 'required|string|max:50',
            ];
        } else if (request()->routeIs('clients.email') ) {
            return [
                'email'        => 'required|email|max:50',
            ];
        } else if (request()->routeIs('clients.affiliation') ) {
            return [
                'affiliation_id'        => 'required|exists:affiliation,id',
            ];
        } 
    }
}
