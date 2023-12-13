<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

/**
 * Get the validation rules that apply to the request.
 *
 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
 */
public function rules(): array
{
    // Check if the current route matches the 'userrole.store' route
    if (request()->routeIs('userrole.store')) {
        // Return the validation rules for the 'userrole.store' route
        return [
            'name'         => 'required|string|max:255',
            'description'  => 'required|string|max:255',
        ];
    } 

    // Return an empty array if the current route does not match the 'userrole.store' route
    return [];
}
}
