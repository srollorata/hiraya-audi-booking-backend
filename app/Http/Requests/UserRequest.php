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
        return true;
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
                'username'      => 'required|string|max:255',
                'password'      => 'required|min:8',
            ];
        } else if (request()->routeIs('user.store')) {
            return [
                'name'          => 'required|string|max:255',
                'email'         => 'required|string|email|max:255',
                'username'      => 'required|string|max:255',
                'password'      => 'required|min:8|confirmed',
            ];
        } else if (request()->routeIs('user.name')) {
            return [
                'name'          => 'required|string|max:255',
            ];
        } else if (request()->routeIs('user.email')) {
            return [
                'email'         => 'required|string|email|max:255',
            ];
        } else if (request()->routeIs('user.password')) {
            return [
                'password'      => 'required|confirmed|min:8',
            ];
        } else if (request()->routeIs('user.avatar') ) {
            return [
                'avatar'        => 'required|image|mimes:jpg,bmp,png|max:2048',
            ];
        } else if (request()->routeIs('user.username') ) {
            return [
                'username'      => 'required|string|max:255',
            ];
        } else if (request()->routeIs('user.admin') ) {
            return [
                'is_admin'      => 'required|in:yes,no',
            ];
        }
    }
}
