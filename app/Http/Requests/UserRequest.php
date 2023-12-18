<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('user.login')) {
            return [
                'email'     => 'required|string|email|max:255',
                'password'  => 'required|min:8',
            ];
        } else if (request()->routeIs('user.store')) {
            return [
                'lastname'      => 'required|string|max:255',
                'firstname'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255',
                'password'  => 'required|min:8|confirmed',
            ];
        } else if (request()->routeIs('user.name')) {
            return [
                'name'      => 'required|string|max:255',
            ];
        } else if (request()->routeIs('user.email')) {
            return [
                'email'      => 'required|string|email|max:255',
            ];
        } else if (request()->routeIs('user.password')) {
            return [
                'password'      => 'required|confirmed|min:8',
            ];
        } else if (request()->routeIs('user.image') || request()->routeIs('profile.image') || request()->routeIs('ocr.image')) {
            return [
                'image'      => 'required|image|mimes:jpg,bmp,png|max:2048',
            ];
        }
    }
}