<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
        if(request()->routeIs('userinfo.update')) {
            return [
                'name'      => 'string|max:255',
                'avatar'    => 'image|mimes:jpeg,jpg,png|max:2048',
                'about'     => 'string|max:255',
                'company'   => 'string|max:255',
                'job'       => 'string|max:255',
                'country'   => 'string|max:255',
                'address'   => 'string|max:255',
                'phone'     => 'string|max:255',
            ];
        }
    }
}
