<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffiliationRequest extends FormRequest
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
        if (request()->routeIs('affiliations.name')) {
            return [
                'name'      => 'required|string|max:50',
            ];
        } else if (request()->routeIs('affiliations.store')) {
            return [
                'name'         => 'max:50',
            ];
        }
    }
}
